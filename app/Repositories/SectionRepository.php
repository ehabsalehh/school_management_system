<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Interfaces\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface{
    public function index()
  {
      $data["Grades"] = Grade::with(['Sections'])->get();
      $data["list_Grades"] = Grade::all();
      $data["teachers"] = Teacher::all();
    return view('pages.Sections.Sections',$data);

  }

  public function store($request)
  {
    try {
      $Sections = section::create([
          "Name_Section"=>['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En],
          "Grade_id"=>$request->Grade_id,
          "Class_id"=>$request->Class_id,
          "Status"=> 1,

      ]);
      $Sections->teachers()->attach($request->teacher_id);
      toastr()->success(trans('messages.success'));
      return redirect()->route('Sections.index');
    }
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  public function update($request)
  {

    try {
      $Sections = Section::findOrFail($request->id);
      $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
      $Sections->Grade_id = $request->Grade_id;
      $Sections->Class_id = $request->Class_id;

      if(isset($request->Status)) {
        $Sections->Status = 1;
      } else {
        $Sections->Status = 2;
      }
      // update pivot tABLE
      if (isset($request->teacher_id)) {
        $Sections->teachers()->sync($request->teacher_id);
    } else {
        $Sections->teachers()->sync(array());
    }
      $Sections->save();
      toastr()->success(trans('messages.Update'));

      return redirect()->route('Sections.index');
  }
    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  public function destroy($request)
  {
    Section::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Sections.index');
  }
  public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

        return $list_classes;
    }
}