<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name','grade_id','classroom_id','teacher_id'];


        // Get the  grade that owns the Subject .

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    // Get the  classroom that owns the Subject .
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }

    // Get the  teacher that owns the Subject .
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
}
