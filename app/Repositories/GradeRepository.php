<?php
namespace App\Repositories;
use App\Models\Grade;
use App\Models\Classroom;
use App\Interfaces\GradeRepositoryInterface;

class GradeRepository implements GradeRepositoryInterface{
    public function index()
    {
      $Grades = Grade::all();
      return view('pages.Grades.Grades',compact('Grades'));    
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($request)
    {
      try {
        Grade::create([
        "Name" => ['en' => $request->Name_en, 'ar' => $request->Name],
        "Notes" => $request->Notes,
        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('Grades.index');
      }
       catch (\Exception $e){
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
        $Grades = Grade::findOrFail($request->id);
        $Grades->update([
          $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
          $Grades->Notes = $request->Notes,
        ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Grades.index');
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
    public function destroy( $request)
    {
      $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');
      if($MyClass_id->count() != 0){
        toastr()->error(trans('Grades_trans.delete_Grade_Error'));
        return redirect()->route('Grades.index');
      }
      $Grades = Grade::findOrFail($request->id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('Grades.index');
  
    }
}