<?php

namespace waynakay;
use waynakay\Teacher;

use Illuminate\Database\Eloquent\Model;


class School extends Model
{
    //
    protected $fillable = [
        'name', 'address', 'city',
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }


}
