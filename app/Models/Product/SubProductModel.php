<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProductModel extends Model
{
    use HasFactory;
    protected $table = 'sub_products';
    public $timestamps = false;
    protected $fillable = [
        'sub_product_name',
        'sub_product_price',
        'sub_pro_discription',
        'sub_product_image',
        'products_id',
    ];
    public function products()
    {
        return $this->belongsTo('App\Models\ProductModel', 'products_id','id');
    }
}
