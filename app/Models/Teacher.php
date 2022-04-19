<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];
        // Get the  specializations that owns the teachers .
        public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
    }

        // Get the  genders that owns the teachers .
        public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }
        // Get the  sections that owns the teachers .

    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section');
    }
    
    
}
