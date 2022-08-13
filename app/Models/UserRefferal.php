<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRefferal extends Model
{
    use HasFactory;
    protected $table = 'user_referrals';
    protected $guarded = ['id'];
}
