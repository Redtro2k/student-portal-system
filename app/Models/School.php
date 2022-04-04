<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $casts = [
        'social_media' => 'json',
        'schedule_time' => 'json'
    ];
}
