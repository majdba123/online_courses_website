<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    use HasFactory;
    protected $fillable = [
        'introduction',
        'youtube',
        'facebook',
        'linkedin',
        'phone',
        'gmail',
    ];

    public function benefit()
    {
        return $this->hasMany(Benefits::class);
    }
    public function achievement()
    {
        return $this->hasMany(Achievements::class);
    }
    public function qfa()
    {
        return $this->hasMany(QFA::class);
    }
}
