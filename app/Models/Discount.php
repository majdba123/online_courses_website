<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'discount_percentage',
        'expired_at',
    ];
    public function courses()
    {
        return $this->hasMany(Courses::class);
    }
}
