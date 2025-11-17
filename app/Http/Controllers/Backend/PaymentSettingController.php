<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $paymentSetting = PaymentSetting::first();
        return view('admin.setting.index', compact('paymentSetting'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'bkash'               => 'nullable|string|max:50',
            'nagad'               => 'nullable|string|max:50',
            'rocket'              => 'nullable|string|max:50',
            'upai'                => 'nullable|string|max:50',
            'bank_name'           => 'nullable|string|max:255',
            'branch_name'         => 'nullable|string|max:255',
            'account_holder_name' => 'nullable|string|max:255',
            'account_number'      => 'nullable|string|max:255',
        ]);

        // Find the record
        $paymentSetting = PaymentSetting::findOrFail($id);

        // Update data
        $paymentSetting->update([
            'bkash'               => $request->bkash,
            'nagad'               => $request->nagad,
            'rocket'              => $request->rocket,
            'upai'                => $request->upai,
            'bank_name'           => $request->bank_name,
            'branch_name'         => $request->branch_name,
            'account_holder_name' => $request->account_holder_name,
            'account_number'      => $request->account_number,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Payment settings updated successfully.');
    }
}
