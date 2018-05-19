<?php

namespace waynakay;
use waynakay\School;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'school_id', 'name', 'lastname', 'phone', 'email',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

}
