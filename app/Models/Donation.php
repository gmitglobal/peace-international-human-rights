<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'payment_type',
        'real_amount',
        'cal_amount',

        // Mobile banking
        'payment_account',
        'transaction_last4',
        'pay_date',

        // Card payment
        'card_account_name',
        'card_account_number',
        'card_trx_id',
        'card_bank_name',
        'card_branch',
        'card_pay_date',

        // Location (FK)
        'division_id',
        'district_id',
        'thana_id',

        // Image
        'post_image',
        'status',
    ];

    // Relationships
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }
}
