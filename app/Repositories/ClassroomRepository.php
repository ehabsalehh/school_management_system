<?php

namespace App\Repositories;

use App\Models\Grade;
use App\Models\Classroom;
use App\Interfaces\ClassroomRepositoryInterface;

class ClassroomRepository implements ClassroomRepositoryInterface{
    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

      $My_Classes = Classroom::all();
      $Grades = Grade::all();
      return view('pages.My_Classes.My_Classes',compact('My_Classes','Grades'));

  }

  public function store($request)
  {
    $List_Classes = $request->List_Classes;

        try {

            foreach ($List_Classes as $List_Class) {
                Classroom::create([
                    "Name_Class"=> ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']],
                    "Grade_id"=>   $List_Class['Grade_id'],
                ]);
            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($request)
  {
    try {
        Classroom::where("id",$request->id)->update([
            "Name_Class" =>['ar' => $request->Name, 'en' => $request->Name_en],
            "Grade_id"=>$request->Grade_id,
        ]);

        // $Classrooms = Classroom::findOrFail($request->id);

        // $Classrooms->update([

        //     $Classrooms->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_en],
        //     $Classrooms->Grade_id = $request->Grade_id,
        // ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Classrooms.index');
    }

    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($request)
  {
    
    Classroom::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Classrooms.index');
  }
  public function delete_all($request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }


    public function Filter_Classes($request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('pages.My_Classes.My_Classes',compact('Grades'))->withDetails($Search);

    }

}