<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SupportRequest;
use Illuminate\Http\Request;

class SupportRequestController extends Controller
{
    public function index()
    {
        return view('clients.support-request.index');
    }


    public function store(Request $request)
    {
        // ✅ Validation
        $validatedData = $request->validate([
            'name'       => 'required|string|max:255',
            'mobile'     => 'required|string|max:20',
            'whatsApp'   => 'nullable|string|max:20',
            'voterid'    => 'required|string|max:50',
            'address'    => 'required|string',
            'problem'    => 'required|string',
            'division'   => 'required|string',
            'district'   => 'required|string',
            'thana'      => 'required|string',
            'post_image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        // ✅ Image Upload Handling
        $imagePath = null;
        if ($request->hasFile('post_image')) {
            $file = $request->file('post_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/support_request'), $filename);
            $imagePath = 'uploads/support_request/' . $filename;
        }

        // ✅ Store in Database (example model)
        // Assuming you have a model named `ContactMessage`
        // php artisan make:model ContactMessage -m
        SupportRequest::create([
            'name'       => $validatedData['name'],
            'mobile'     => $validatedData['mobile'],
            'whatsapp'   => $validatedData['whatsApp'],
            'voterid'    => $validatedData['voterid'],
            'address'    => $validatedData['address'],
            'problem'    => $validatedData['problem'],
            'division'   => $validatedData['division'],
            'district'   => $validatedData['district'],
            'thana'      => $validatedData['thana'],
            'post_image' => $imagePath,
        ]);

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
