<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table="product";
    public $timestamps=false;
    protected $fillable=[
            'id',
            'pname',
            'pquantity',
            'pcode',
            'p_status',
            'price',
            'b_id',
            'cat_id',
            'image',
    ];
}
