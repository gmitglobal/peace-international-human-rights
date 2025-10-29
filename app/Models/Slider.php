<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'background_image',
        'logo_image',
        'title',
        'subtitle',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
        'is_active',
        'sort_order',
    ];
}
