<?php

namespace waynakay;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'image', 'title', 'detail', 'country', 'event_day',    
    ];
}
