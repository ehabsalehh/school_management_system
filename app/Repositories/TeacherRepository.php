<?php
namespace App\Repositories;
use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\TeacherRepositoryInterface;
class TeacherRepository implements TeacherRepositoryInterface{

  public function getAllTeachers(){
    return Teacher::all();
}
public function Getspecialization(){
    return specialization::all();
}

public function GetGender(){
   return Gender::all();
}

public function StoreTeachers($request){
// insert data in teacer table
try {
        Teacher::create([
            "Email"          =>"$request->Email",
            "Password"       =>"Hash::make($request->Password)",
            "Name"           =>"$request->Name_en, 'ar' => $request->Name_ar]",
            "Specialization_id"=>"$request->Specialization_id",
            "Gender_id"       =>"$request->Gender_id",
            "Joining_Date"   =>"$request->Joining_Date",
            "Address"         =>"$request->Address",
        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('Teachers.create');
    }
    catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }

}


public function editTeachers($id)
{
    return Teacher::findOrFail($id);
}


public function UpdateTeachers($request)
{
// update data in teacer table
    try {
        Teacher::where("id",$request->id)->update([
            "email"=>$request->Email,
            "password"=>hash::make($request->Password),
            "Name"=>['en' => $request->Name_en, 'ar' => $request->Name_ar],
            "Specialization_id"=>$request->Specialization_id,
            "Gender_id"=>$request->Gender_id,
            "Joining_Date"=>$request->Joining_Date,
            "Address"=>$request->Address,
        ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Teachers.index');
    }
    catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
}


public function DeleteTeachers($request)
{
    Teacher::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Teachers.index');
}


}
