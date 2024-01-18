<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'discription',
        'time_of_course',
        'doctor_id',
        'discount_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class,'discount_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function video()
    {
        return $this->hasMany(video::class);
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
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
