<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    use HasFactory;

    protected $table = 'payment_settings';

    protected $fillable = [
        'bkash',
        'nagad',
        'rocket',
        'upai',
        'bank_name',
        'branch_name',
        'account_holder_name',
        'account_number',
    ];
}
