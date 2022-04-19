<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptStudent extends Model
{
    // Get the  student that owns the ReceiptStudent .

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
