<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantsModel extends Model
{
    use HasFactory;
    protected $table = 'variants';
     public $timestamps = false;
    protected $filable = [
    	'variant_name',
    	'variant_size',
    	'variant_note',
    	'sub_product_id'

    ];
}
