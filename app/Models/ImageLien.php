<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageLien extends Model
{
    protected $fillable = [
        'image',
        'url',
    ];
}
