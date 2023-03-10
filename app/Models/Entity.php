<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'data',
        'user_id'
    ];
}
