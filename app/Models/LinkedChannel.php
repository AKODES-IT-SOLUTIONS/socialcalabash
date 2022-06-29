<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedChannel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'page_id',
        'page_name',
        'access_token',
        'imageToShow',
        'twitter_sceret',
        'channel_type',
        
    ];
}
