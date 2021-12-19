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

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'role_id',
        'username',
        'email_address',
        'password',
        'address',
        'gender',
        'birth_date'
    ];
    public $timestamps = false;

    protected $hidden = [
        'remember_token',
    ];

    // 'User' belongs to 'Role'
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }

    // One 'User' to many 'Cart'
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // One 'User' to many 'Transaction'
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
