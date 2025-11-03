<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Activites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of with optional search.
     */

    public function index(Request $request)
    {
        $activities = Activites::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a category.
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        ## ✅ Validate form input
        $request->validate([
            'title'      => 'required|string|max:255',
            'paragraph'  => 'required|string',
            'post_image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:1024000',
        ]);

        ## 🖼️ Handle image upload
        $postImagePath = null;
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/activities'), $imageName);
            $postImagePath = 'uploads/activities/' . $imageName;
        }

        ## 💾 Save data to database
        Activites::create([
            'user_id'    => Auth::id(), ## logged-in user
            'title'      => $request->title,
            'paragraph'  => $request->paragraph,
            'post_image' => $postImagePath,
            'date'       => now()->format('Y-m-d'),
            'status'     => 1,
            'sort_order' => 0,
        ]);

        ## 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Activity added successfully!');
    }

    /**
     * Show the form for editing a category.
     */
    public function edit($id)
    {
        $activities = Activites::findOrFail($id);
        return view('admin.activities.edit', compact('activities'));
    }


    public function update(Request $request, $id)
    {
        $activity = Activites::findOrFail($id);

        // ✅ Validate input
        $request->validate([
            'title'      => 'required|string|max:255',
            'paragraph'  => 'required|string',
            'post_image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:1024000', // up to 1GB
        ]);

        // 🖼️ Handle image update
        $postImagePath = $activity->post_image; // keep old image by default

        if ($request->hasFile('post_image')) {
            // Delete old image if exists
            if ($activity->post_image && file_exists(public_path($activity->post_image))) {
                unlink(public_path($activity->post_image));
            }

            // Upload new image
            $image = $request->file('post_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/activities'), $imageName);

            $postImagePath = 'uploads/activities/' . $imageName;
        }

        // 💾 Update the record
        $activity->update([
            'title'      => $request->title,
            'paragraph'  => $request->paragraph,
            'post_image' => $postImagePath,
        ]);

        // 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Activity updated successfully!');
    }


    public function destroy($id)
    {
        $activity = Activites::findOrFail($id);

        // 🖼️ Delete image file if exists
        if ($activity->post_image && file_exists(public_path($activity->post_image))) {
            unlink(public_path($activity->post_image));
        }

        // 🗑️ Delete the record
        $activity->delete();

        // 🔁 Redirect back with message
        return redirect()->back()->with('success', 'Activity deleted successfully!');
    }

    /**
     * Toggle the status of a category.
     */
    public function toggleStatus($id)
    {
        $activites = Activites::findOrFail($id);
        $activites->status = !$activites->status;
        $activites->save();

        return back()->with('success', 'Activites status updated.');
    }
}
