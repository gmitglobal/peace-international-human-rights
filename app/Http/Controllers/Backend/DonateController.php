<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        $paymentSetting = PaymentSetting::first();
        return view('clients.donate.index', compact('paymentSetting'));
    }
}
