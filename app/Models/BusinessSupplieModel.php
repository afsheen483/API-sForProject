<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSupplieModel extends Model
{
    use HasFactory;
    protected $table = "suppliers_business";
    public $timestamps = false;
    protected $fillable = [
        'business_name',
        'business_type',
        'business_image',
        'business_address',
        'user_id',
        'city_id',

    ];
}
