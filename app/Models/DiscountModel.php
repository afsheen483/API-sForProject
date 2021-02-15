<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model
{
    use HasFactory;
    protected $table = "discount";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'discount_percentage',
        'dicount_title',
        'date',
    ];
}
