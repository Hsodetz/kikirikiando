<?php

namespace waynakay;
use waynakay\School;
use waynakay\Teacher;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    //
    protected $fillable = [
        'school_id', 'teacher_id', 'name', 'schedule',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}
