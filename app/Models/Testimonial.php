<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'description',
        'company',
        'name',
        'is_active'
    ];
}
