<?php

namespace waynakay;

use Illuminate\Database\Eloquent\Model;
use waynakay\Father;
use waynakay\Teacher;

class Observation extends Model
{
    //
    protected $fillable = [
        'teacher_id', 'father_id', 'affair', 'message',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function father()
    {
        return $this->belongsTo(Father::class);
    }

}
