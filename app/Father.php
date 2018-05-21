<?php

namespace waynakay;
use waynakay\Student;

use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    //
    protected $fillable = [
        'name', 'lastname', 'city', 'email', 'phone','password',
    ];

    protected $hidden = [
        'password',
    ];

    //Funcion en la que definimos que un padre puede tener muchos estudiantes o alumnos.
    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
