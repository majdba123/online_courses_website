<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name_country',
        'name_city',
        'name_area',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
