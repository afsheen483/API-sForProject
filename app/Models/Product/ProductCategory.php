<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductCategory extends Model
{
    use HasFactory;
    protected $table = "product_categories";
    public $timestamps = false;
    protected $fillable = [
        'category_name',
        'date',
    ];

}
