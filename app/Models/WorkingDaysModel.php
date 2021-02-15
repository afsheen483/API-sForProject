<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// WorkingDaysModel
class WorkingDaysModel extends Model
{
    use HasFactory;
     protected $table = 'working_days';
    public $timestamps = false;
    protected $filable = [
    	'working_day_name',
    	'business_id'

    ];
}
