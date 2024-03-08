<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquire extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subject',
        'email',
        'discription',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
