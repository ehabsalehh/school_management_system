<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];

    // Get the  gender that owns the student .
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    // Get the  grade that owns the student .

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    // Get the  classroom that owns the student .

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }

    // Get the  section that owns the student .

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
    // Get the  images that owns the student .
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
    // Get the  Nationality that owns the student .
    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_id');
    }
    // Get the  myparent that owns the student .

    public function myparent()
    {
        return $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }
    // Get the  student_account for the student .

    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');

    }
        // Get the  attendance for the student .
    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }
}
