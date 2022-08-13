<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'username',
        'mobile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function login_logs()
    {
        return $this->hasMany(UserLogin::class);
    }
    public function userlogin()
    {
        return $this->hasMany(UserLogin::class);
    }
    // SCOPES

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('id', 'desc');
    }
    public function invests()
    {
        return $this->hasMany(Invest::class)->orderBy('id', 'desc');
    }
    public function deposits()
    {
        return $this->hasMany(Deposit::class)->orderBy('id', 'desc');
    }
}
