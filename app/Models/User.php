<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name',
        'email',
        'password',
        'type_user',
        'image',
        'phone',
        'age'
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
        'password' => 'hashed',
    ];
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function address()
    {
        return $this->hasMany(Address::class);
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    public function inquire()
    {
        return $this->hasMany(inquire::class);
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function Registration_statu()
    {
        return $this->hasMany(Registration_statu::class);
    }
}
