<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $guarded=[];
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    // Get the fromGrade that owns the prmotion.

    public function f_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'from_grade');
    }


    // Get the fromclassroom that owns the prmotion.

    public function f_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'from_Classroom');
    }

    // Get the fromsection that owns the prmotion.

    public function f_section()
    {
        return $this->belongsTo('App\Models\Section', 'from_section');
    }

    // Get the toGrade that owns the prmotion.

    public function t_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'to_grade');
    }


    // Get the toClassroom that owns the prmotion.

    public function t_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'to_Classroom');
    }

    // Get the toSection that owns the prmotion.

    public function t_section()
    {
        return $this->belongsTo('App\Models\Section', 'to_section');
    }
}
