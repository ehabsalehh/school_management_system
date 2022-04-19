<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Section'];
    protected $fillable=['Name_Section','Grade_id','Class_id',"Status"];

    protected $table = 'sections';
    public $timestamps = true;


    // Get the classes that owns the Section.

    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }
    // Get the teachers that owns the sections.
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }
        // Get the Grades that owns the sections.
    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade','Grade_id');
    }
}
