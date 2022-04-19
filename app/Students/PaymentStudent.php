<?php

namespace App\Students;

use Illuminate\Database\Eloquent\Model;

class PaymentStudent extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
