<?php

namespace waynakay;
use waynakay\Matter;
use waynakay\Student;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    //
    protected $fillable = [
        'matter_id', 'student_id', 'assistance_result', 'date_time',
    ];

    // Definimos un metodo donde hacemos la la relacion en que una asistencia pertenece a una materia.
    public function matter()
    {
        return $this->belongsTo(Matter::class);
    }

    // Metodo en el que se de fine que una asistencia pertenece a un alumno
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
