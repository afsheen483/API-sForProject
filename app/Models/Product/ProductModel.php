<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "products";
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'product_name',
        'product_image',
        'date',
        'category_id',
    ];
}
