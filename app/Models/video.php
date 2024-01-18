<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
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
