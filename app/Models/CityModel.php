<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;
    protected $table = "cities";
    public $timestamps = false;
    protected $fillable = [
        
        'city_name',
        'city_postal_code',
        'city_image',
    ];
}
