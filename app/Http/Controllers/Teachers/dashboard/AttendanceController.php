<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Models\Section;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\AttendanceStudentsRequest;
use App\Interfaces\Teacher\AttendanceRepositoryInterface;

class AttendanceController extends Controller
{
    protected $attendance;

    public function __construct(AttendanceRepositoryInterface $attendance)
    {
        $this->attendance = $attendance;
    }
    public function attendanceReport(){
        return $this->attendance->attendanceReport();
        // $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        // $students = Student::whereIn('section_id', $ids)->get();
        // return view('pages.Teachers.dashboard.students.attendance_report', compact('students'));
    }
    public function attendanceSearch(AttendanceStudentsRequest $request){

        return $this->attendance->attendanceSearch($request);

    }

}
