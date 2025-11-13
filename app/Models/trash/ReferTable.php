<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferTable extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'refer_id',
        'count',
        'role'
    ];

    public function referredUsers()
    {
        return $this->hasMany(User::class, 'refered_by', 'refer_id');
    }
}
