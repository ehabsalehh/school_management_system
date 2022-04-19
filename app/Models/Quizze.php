<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    // Get the  teacher that owns the Quizze .
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
    // Get the  subject that owns the Quizze .
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }
    // Get the  grade that owns the Quizze .
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    // Get the  classroom that owns the Quizze .
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }
    // Get the  section that owns the Quizze .
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
}
