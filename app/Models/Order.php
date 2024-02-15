<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Order extends Model
{
    use HasFactory;
    protected $keyType = 'string'; // Set the key type to UUID
    public $incrementing = false; // Disable auto-incrementing
    protected $fillable = [
        'user_id',
        'courses_id',
        'price',
        'image',
        'status',
    ];
    public static function boot() {
        parent::boot();
        // Auto generate UUID when creating data User
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function courses()
    {
        return $this->belongsTo(Courses::class,'courses_id');
    }
}
