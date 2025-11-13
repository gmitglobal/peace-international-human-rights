<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MyRole;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        // Get search keyword from query string (like ?search=xyz)
        $search = $request->input('search');

        // Base query with relationships
        $query = User::with(['divisions', 'districts', 'thanas']);

        // ✅ Apply search filters if any keyword is given
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhereHas('divisions', function ($div) use ($search) {
                        $div->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('districts', function ($dis) use ($search) {
                        $dis->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('thanas', function ($thana) use ($search) {
                        $thana->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // ✅ Paginate results
        $items = $query->paginate(8);

        $myRoles = MyRole::where('status', '=', 1)->get(['id','name']);

        // Return to view
        return view('admin.member-list.index', compact('items', 'search', 'myRoles'));
    } ## End Mehtod


    public function details($id)
    {
        $user = User::findOrFail($id);
        return view('admin.member-list.details', compact('user'));
    }

    public function toggleStatus($id)
    {
        $admin = User::findOrFail($id);
        // $admin->refer_id = ;
        $admin->status   = $admin->status == 1 ? 0 : 1;
        $admin->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    } ## End Mehtod

    /* Delete a category and its images */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);

        $this->deleteImage($user->image);
        $this->deleteImage($user->thumb_image);

        $user->delete();

        return redirect()->route('admin.member-list.index')->with('success', 'Deleted successfully.');
    }

    /**
     * Delete image from storage if not default.
     */
    private function deleteImage($imagePath)
    {
        if (!$imagePath || $imagePath === 'images/no_image.jpg') return;

        $fullPath = public_path($imagePath);
        if (file_exists($fullPath)) @unlink($fullPath);
    }
}
