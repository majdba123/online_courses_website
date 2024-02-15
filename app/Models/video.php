<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class video extends Model
{
    use HasFactory;
    protected $keyType = 'string'; // Set the key type to UUID
    public $incrementing = false; // Disable auto-incrementing

    public static function boot() {
        parent::boot();
        // Auto generate UUID when creating data User
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
    protected $fillable = [
        'name',
        'video_url',
        'discription',
        'time_of_video',
        'courses_id',
    ];
    public function courses()
    {
        return $this->belongsTo(Courses::class,'courses_id');
    }

}
