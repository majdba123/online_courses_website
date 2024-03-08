<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'benefits',
        'web_id'
    ];
    public function web()
    {
        return $this->belongsTo(Web::class,'web_id');
    }
}
