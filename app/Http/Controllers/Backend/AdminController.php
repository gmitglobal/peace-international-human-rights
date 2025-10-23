<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminProfilePage()
    {
        $id = Auth::user()->id;
        $data = User::findorfail($id);
        return view('admin.admin_profile_page', compact('data'));
    } ## End Mehtod

    public function AdminProfileUpdate(Request $request)
    {
        ## ✅ Validate the request
        $validated = $request->validate(
            [
                'name'                 => 'required|max:150',
                'email'                => 'nullable|email|max:255',
                'phone'                => 'required|string|max:20|unique:users,phone,' . Auth::id(),
                'wphone'               => 'nullable|string|max:20',
                'father_name'          => 'nullable|string|max:255',
                'mother_name'          => 'nullable|string|max:255',
                'birth_certificate_no' => 'nullable|string|max:255',
                'present_address'      => 'nullable|string|max:500',
                'permanent_address'    => 'nullable|string|max:500',
                'division'             => 'nullable|string|max:255',
                'district'             => 'nullable|string|max:255',
                'thana'                => 'nullable|string|max:255',
                'ward'                 => 'nullable|string|max:255',
                'central'              => 'nullable|string|max:255',
                'photo'                => 'nullable|image|mimes:jpg,png,jpeg,webp|max:51200', // 50MB in KB
                'nid'                  => 'nullable|image|mimes:jpg,png,jpeg,webp|max:51200',
                'signature'            => 'nullable|image|mimes:jpg,png,jpeg,webp|max:51200',
            ],
            [
                'name.required'  => 'Name field cannot be empty',
                'photo.image'    => 'Profile photo must be an image',
                'photo.mimes'    => 'Only jpg, jpeg, png, and webp formats are allowed',
                'phone.required' => 'Phone number is required',
                'phone.unique'   => 'This phone number is already taken',
            ]
        );

        $user = Auth::user();

        ## ✅ Update profile fields
        $user->name                 = $request->name;
        $user->email                = $request->email;
        $user->phone                = $request->phone;
        $user->wphone               = $request->wphone;
        $user->father_name          = $request->father_name;
        $user->mother_name          = $request->mother_name;
        $user->birth_certificate_no = $request->birth_certificate_no;
        $user->present_address      = $request->present_address;
        $user->permanent_address    = $request->permanent_address;
        $user->division             = $request->division;
        $user->district             = $request->district;
        $user->thana                = $request->thana;
        $user->ward                 = $request->ward;
        $user->central              = $request->central;

        ## ✅ Handle profile photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            // Delete old image if exists
            if ($user->photo && file_exists(public_path($user->photo))) {
                @unlink(public_path($user->photo));
            }

            $filename = now()->format('Ymd_His') . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/user_photos/' . $filename;
            $file->move(public_path('uploads/user_photos'), $filename);

            $user->photo = $filePath;
        }

        ## ✅ Handle signature upload
        if ($request->hasFile('signature')) {
            $file = $request->file('signature');

            // Delete old signature if exists
            if ($user->signature && file_exists(public_path($user->signature))) {
                @unlink(public_path($user->signature));
            }

            $filename = now()->format('Ymd_His') . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/user_signatures/' . $filename;
            $file->move(public_path('uploads/user_signatures'), $filename);

            $user->signature = $filePath;
        }

        ## ✅ Handle nid upload
        if ($request->hasFile('nid')) {
            $file = $request->file('nid');

            // Delete old nid if exists
            if ($user->nid && file_exists(public_path($user->nid))) {
                @unlink(public_path($user->nid));
            }

            $filename = now()->format('Ymd_His') . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/user_nids/' . $filename;
            $file->move(public_path('uploads/user_nids'), $filename);

            $user->nid = $filePath;
        }

        $user->save();

        return redirect()->back()->with([
            'message' => 'Profile updated successfully.',
            'alert-type' => 'success',
        ]);
    } ## End Mehtod

    public function AdminPasswordChangePage()
    {
        $id = Auth::user()->id;
        $editData = User::findorfail($id);
        return view('admin.admin_password_change_page', compact('editData'));
    } ## End Mehtod

    public function AdminPasswordUpdate(Request $request)
    {
        ## ✅ Validate input
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ], [
            'old_password.required' => 'Please enter your current password.',
            'new_password.required' => 'Please enter a new password.',
            'new_password.confirmed' => 'New password confirmation does not match.',
            'new_password.min' => 'New password must be at least 8 characters.',
        ]);

        $user = Auth::user();

        ## ✅ Check if old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with([
                'message' => "Old password doesn't match.",
                'alert-type' => 'warning',
            ]);
        }

        ## ✅ Update new password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with([
            'message' => 'Password changed successfully.',
            'alert-type' => 'success',
        ]);
    }

    ## Register New Member Page
    public function RegisterNewMember(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied.');
        }

        $query = User::query();

        ## Only list users with 'admin' or 'staff' role if needed
        $query->whereIn('role', ['admin', 'staff']);

        ## Filter by name, email, or phone
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $admins = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.admin_register_page', compact('admins'));
    } ## End Mehtod

    ## Register New Member
    public function store(Request $request)
    {
        ## ✅ Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ], [
            'name.required' => 'Full name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ]);

        ## ✅ Create new admin user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 1,
            'role' => 'staff',
        ]);

        ## ✅ Return success with flash message
        return redirect()->back()->with('success', 'Admin registered successfully!');
    } ## End Mehtod

    public function toggleStatus($id)
    {
        $admin = User::findOrFail($id);
        $admin->status = $admin->status == 1 ? 0 : 1;
        $admin->save();

        return redirect()->back()->with('success', 'Admin status updated successfully.');
    } ## End Mehtod
}
