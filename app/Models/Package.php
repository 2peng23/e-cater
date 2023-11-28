<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'inclusion',
        'price',
        'name',
    ];
    protected $casts = [
        'inclusion' => 'array'
    ];
}
