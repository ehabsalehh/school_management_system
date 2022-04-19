<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessingFee extends Model
{
    // Get the  student that owns the ProcessingFee .
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
