<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $keyType = 'string'; // Set the key type to UUID
    public $incrementing = false; // Disable auto-incrementing
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
    public static function boot() {
        parent::boot();
        // Auto generate UUID when creating data User
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
