<?php

namespace waynakay;
use waynakay\Student;
use waynakay\School;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    //
    protected $fillable = [
        'student_id', 'school_id', 'code', 
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

}
