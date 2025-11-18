<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index(Request $request)
    {
        $donations = Donation::query()
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;

                $q->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('mobile', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $total_sum = Donation::where('status', 1)
            ->whereNotNull('cal_amount')
            ->sum('cal_amount');

        return view('admin.donation.index', compact('donations', 'total_sum'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name'                => 'required|string|max:255',
            'mobile'              => 'required|string|max:20',
            'real_amount'         => 'required|numeric',
            'payment_type'        => 'required|string|in:bkash,nogod,rocket,upay,card',

            // Mobile banking fields
            'payment_account'     => 'nullable|required_if:payment_type,bkash,nogod,rocket,upay|string|max:50',
            'transaction_last4'   => 'nullable|required_if:payment_type,bkash,nogod,rocket,upay|string|max:10',
            'pay_date'            => 'nullable|required_if:payment_type,bkash,nogod,rocket,upay|date',

            // Card fields
            'card_account_name'   => 'nullable|required_if:payment_type,card|string|max:255',
            'card_account_number' => 'nullable|required_if:payment_type,card|string|max:50',
            'card_trx_id'         => 'nullable|required_if:payment_type,card|string|max:50',
            'card_bank_name'      => 'nullable|required_if:payment_type,card|string|max:100',
            'card_branch'         => 'nullable|required_if:payment_type,card|string|max:100',
            'card_pay_date'       => 'nullable|required_if:payment_type,card|date',

            // Address
            'division_id'         => 'required|exists:divisions,id',
            'district_id'         => 'required|exists:districts,id',
            'thana_id'            => 'required|exists:thanas,id',

            // Proof
            'post_image'          => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('post_image')) {
            $imagePath = $request->hasFile('post_image') ? $this->uploadImage($request->file('post_image')) : null;
        }

        // Store donation
        $donation = Donation::create([
            'name'                => $request->name,
            'mobile'              => $request->mobile,
            'real_amount'         => $request->real_amount,
            'payment_type'        => $request->payment_type,

            // Mobile banking
            'payment_account'     => $request->payment_account,
            'transaction_last4'   => $request->transaction_last4,
            'pay_date'            => $request->pay_date,

            // Card payment
            'card_account_name'   => $request->card_account_name,
            'card_account_number' => $request->card_account_number,
            'card_trx_id'         => $request->card_trx_id,
            'card_bank_name'      => $request->card_bank_name,
            'card_branch'         => $request->card_branch,
            'card_pay_date'       => $request->card_pay_date,

            // Address
            'division_id'         => $request->division_id,
            'district_id'         => $request->district_id,
            'thana_id'            => $request->thana_id,

            // Proof
            'post_image'          => $imagePath,
            'status'              => 0, // default pending
        ]);

        return redirect()->back()->with('success', 'Donation submitted successfully!');
    }


    /**
     * Toggle the status of a category.
     */
    public function toggleStatus($id)
    {
        $activites = Donation::findOrFail($id);

        if ($activites->status == 0) {
            $cal_amount = $activites->real_amount * 0.65;
            $activites->cal_amount = $cal_amount;
            $activites->status = 1;
        } else {
            $activites->cal_amount = null;
            $activites->status = 0;
        }

        $activites->save();

        return back()->with('success', 'Activites status updated.');
    }

    /**
     * Upload image and return its path.
     */
    private function uploadImage($image)
    {
        $path = 'uploads/donation_images';
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($path), $filename);

        return $path . '/' . $filename;
    }
}
