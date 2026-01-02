<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of with optional search.
     */

    public function index(Request $request)
    {
        $photoGalleries = PhotoGallery::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('title', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.photo-gallery.index', compact('photoGalleries'));
    }

    /**
     * Show the form for creating a category.
     */
    public function create()
    {
        return view('admin.photo-gallery.create');
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

            // Store in 'public/uploads/photo-gallery' folder
            $path = $image->storeAs('public/uploads/photo-gallery', $imageName);

            // Path for database (accessible via storage link)
            $postImagePath = str_replace('public/', 'storage/', $path);
        }

        ## 💾 Save data to database
        PhotoGallery::create([
            'user_id'    => Auth::id(), ## logged-in user
            'title'      => $request->title,
            'paragraph'  => $request->paragraph,
            'post_image' => $postImagePath,
            'date'       => now()->format('Y-m-d'),
            'status'     => 1,
            'sort_order' => 0,
        ]);

        ## 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Photo Gallery added successfully!');
    }

    /**
     * Show the form for editing a category.
     */
    public function edit($id)
    {
        $activities = PhotoGallery::findOrFail($id);
        return view('admin.photo-gallery.edit', compact('activities'));
    }


    public function update(Request $request, $id)
    {
        $activity = PhotoGallery::findOrFail($id);

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
            if ($activity->post_image && Storage::exists($activity->post_image)) {
                Storage::delete($activity->post_image);
            }

            // Upload new image using store
            $image = $request->file('post_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Store in 'public/photo-gallery' folder
            $path = $image->storeAs('public/photo-gallery', $imageName);

            // Get path for database (remove 'public/' to use with storage link)
            $postImagePath = str_replace('public/', 'storage/', $path);
        }


        // 💾 Update the record
        $activity->update([
            'title'      => $request->title,
            'paragraph'  => $request->paragraph,
            'post_image' => $postImagePath,
        ]);

        // 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Photo Gallery updated successfully!');
    }


    public function destroy($id)
    {
        $activity = PhotoGallery::findOrFail($id);

        // 🖼️ Delete image file if exists
        if ($activity->post_image && file_exists(public_path($activity->post_image))) {
            unlink(public_path($activity->post_image));
        }

        // 🗑️ Delete the record
        $activity->delete();

        // 🔁 Redirect back with message
        return redirect()->back()->with('success', 'Photo Gallery deleted successfully!');
    }

    /**
     * Toggle the status of a category.
     */
    public function toggleStatus($id)
    {
        $data = PhotoGallery::findOrFail($id);
        $data->status = !$data->status;
        $data->save();

        return back()->with('success', 'Photo Gallery status updated.');
    }
}
