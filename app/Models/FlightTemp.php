<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//This model interacts with 'flightstemp' table
class FlightTemp extends Model
{
    use HasFactory;

    protected $table = 'flightstemp';
}
