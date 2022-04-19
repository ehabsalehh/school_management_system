<?php
namespace App\Repositories;
use App\Models\Fee;
use App\Models\Grade;
use App\Interfaces\FeesRepositoryInterface;


class FeesRepository implements FeesRepositoryInterface
{

    public function index(){
        $fees = Fee::all();
        $Grades = Grade::all();
        return view('pages.Fees.index',compact('fees','Grades'));

    }

    public function create(){

        $Grades = Grade::all();
        return view('pages.Fees.add',compact('Grades'));
    }

    public function edit($id){

        $fee = Fee::findorfail($id);
        $Grades = Grade::all();
        return view('pages.Fees.edit',compact('fee','Grades'));

    }


    public function store($request)
    {
        //insert data in Fee table 
        try {
            Fee::create([
                "title"=> ['en' => $request->title_en, 'ar' => $request->title_ar],
                "amount"=>   $request->amount,
                "Grade_id"=>   $request->Grade_id,
                "Classroom_id"=>  $request->Classroom_id,
                "description"=>  $request->description,
                "Fee_type"=>   $request->Fee_type,
                "year"=>   $request->year,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fees.create');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        //update data in fees table 
        try {
            $fees = Fee::findorfail($request->id);
            $fees->update([
                $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar],
                $fees->amount  =$request->amount,
                $fees->Grade_id  =$request->Grade_id,
                $fees->Classroom_id  =$request->Classroom_id,
                $fees->description  =$request->description,
                $fees->year  =$request->year,
            ]);           
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        //Delete data in Fee table 
        try {
            Fee::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
