<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightEvent extends Model
{
    use HasFactory;
    protected $table = 'flightevents';
    public $timestamps = false;
    protected $attributes = [
        'name' => 'Unknown',
        'location' => 'Unknown',
        'country' => 'unknown',
        'price' => 0,
        'image' => ''
    ];
    //protected $hidden = ['id'];
}
