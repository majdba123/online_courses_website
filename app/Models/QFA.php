<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QFA extends Model
{
    use HasFactory;
    protected $fillable = [
        'quastion',
        'answee',
        'web_id'
    ];
    public function web()
    {
        return $this->belongsTo(Web::class,'web_id');
    }
}
