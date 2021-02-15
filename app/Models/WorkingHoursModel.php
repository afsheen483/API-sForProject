<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// WorkingHoursModel
class WorkingHoursModel extends Model
{
    use HasFactory;
    protected $table = 'working_duration';
    public $timestamps = false;
    protected $filable = [
    	'opening_time',
    	'delivery_hours',
    	'closing_time',
    	'working_day_id'

    ];
}
