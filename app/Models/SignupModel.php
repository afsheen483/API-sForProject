<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignupModel extends Model
{
    use HasFactory;
    protected $table = "users";
    public $timestamps=false;
    protected $fillable = [
        'user_firstname',
        'user_lastname',
        'user_email',
        'user_password',
        'profile_image',
        'user_contact_no',
        'user_address',
        'user_cnic',
        'role_id',
    ];
}
