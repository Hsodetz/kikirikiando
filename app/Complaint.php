<?php

namespace waynakay;

use Illuminate\Database\Eloquent\Model;
use waynakay\Father;
use waynakay\Student;

class Complaint extends Model
{
    //
    protected $fillable = [
        'father_id', 'student_id', 'affair', 'text', 'image', 'file', 'gravity', 
    ];

    public function father()
    {
        return $this->belongsTo(Father::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
