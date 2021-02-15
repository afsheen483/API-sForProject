<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponsModel extends Model
{
    use HasFactory;
     protected $table = "coupons";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'coupon_code',
        'coupon_name',
        'coupon_startdate',
        'coupon_end_date',
        'coupon_limit',
        'discount_id',
        'supplier_business_id',
      ];
}
