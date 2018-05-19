<?php

namespace waynakay;
use waynakay\School;
use waynakay\Father;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'father_id', 'school_id', 'registration_number', 'name', 'lastname', 'age', 
    ];

    //Funcio que define que un alumno pertenece a un colegio
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // Un estudiante pertenece a un padre
    public function father()
    {
        return $this->belongsTo(Father::class);
    }

}
