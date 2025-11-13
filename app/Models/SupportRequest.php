<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'whatsapp',
        'voterid',
        'address',
        'problem',
        'post_image'
    ];
}
