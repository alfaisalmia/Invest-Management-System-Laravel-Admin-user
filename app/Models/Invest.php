<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function plan()
    {
        return $this->hasOne(Plan::class, 'id', 'plan_id')->withDefault();
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }
}
