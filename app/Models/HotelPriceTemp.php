<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPriceTemp extends Model
{
    use HasFactory;

    protected $table = 'hotelpricetemp';
    public $timestamps = false;

    public static function getTableName(): string{
        return (new self())->getTable();
    }
}
