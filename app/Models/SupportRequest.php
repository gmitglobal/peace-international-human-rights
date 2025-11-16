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
        'title',
        'problem',
        'division',
        'district',
        'thana',
        'post_image'
    ];

    // A support request belongs to a division
    public function divisionRelation()
    {
        return $this->belongsTo(Division::class, 'division');
    }

    // A support request belongs to a district
    public function districtRelation()
    {
        return $this->belongsTo(District::class, 'district');
    }

    // A support request belongs to a thana
    public function thanaRelation()
    {
        return $this->belongsTo(Thana::class, 'thana');
    }
}
