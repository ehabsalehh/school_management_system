<?php
namespace App\Repositories\Teacher;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Teacher\AttendanceRepositoryInterface;

class AttendanceRepository implements AttendanceRepositoryInterface
{
    public function teacherStudents(){
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
         return  Student::whereIn('section_id', $ids)->get();
    }

    public function attendanceReport(){
        $students = $this->teacherStudents();
        return view('pages.Teachers.dashboard.students.attendance_report', compact('students'));
    }
    public function attendanceSearch($request){
        $students = $this->teacherStudents();
        if($request->student_id == 0){

            $attendanceStudents = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('pages.Teachers.dashboard.students.attendance_report',compact('attendanceStudents','students'));
        }
     
        else{
     
            $attendanceStudents = Attendance::where('student_id',$request->student_id)->whereBetween('attendence_date', [$request->from, $request->to])
            ->get();
            return view('pages.Teachers.dashboard.students.attendance_report',compact('attendanceStudents','students'));
        }
    }
    

    
}
