<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'courses_id',
        'discription',
    ];



    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function courses()
    {
        return $this->belongsTo(Courses::class,'courses_id');
    }
}
