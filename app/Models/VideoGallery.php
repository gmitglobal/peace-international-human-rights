<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_link',
        'title',
        'paragraph',
        'date',
        'status',
        'sort_order',
    ];

    // 🔗 Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
