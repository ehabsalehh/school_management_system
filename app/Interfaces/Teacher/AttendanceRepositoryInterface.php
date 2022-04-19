<?php
namespace App\Interfaces\Teacher;
interface AttendanceRepositoryInterface
{
    public function teacherStudents();
    public function attendanceReport();
    public function attendanceSearch($request);

}
