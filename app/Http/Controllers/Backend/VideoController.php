<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of with optional search.
     */
    public function index(Request $request)
    {
        $videoGalleries = VideoGallery::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('title', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.video-gallery.index', compact('videoGalleries'));
    }


    /**
     * Show the form for creating a category.
     */
    public function create()
    {
        return view('admin.video-gallery.create');
    }


    public function store(Request $request)
    {
        ## ✅ Validate form input
        $request->validate([
            'title'     => 'required|string|max:255',
            'paragraph' => 'required|string',
        ]);

        ## 💾 Save data to database
        VideoGallery::create([
            'user_id'    => Auth::id(), ## logged-in user
            'title'      => $request->title,
            'video_link' => $request->paragraph,
            'date'       => now()->format('Y-m-d'),
            'status'     => 1,
            'sort_order' => 0,
        ]);

        ## 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Video Gallery added successfully!');
    }


    /**
     * Show the form for editing a category.
     */
    public function edit($id)
    {
        $videoGallery = VideoGallery::findOrFail($id);
        return view('admin.video-gallery.edit', compact('videoGallery'));
    }


    public function update(Request $request, $id)
    {
        $activity = VideoGallery::findOrFail($id);

        // ✅ Validate input
        $request->validate([
            'title'     => 'required|string|max:255',
            'paragraph' => 'required|string',
        ]);

        // 💾 Update the record
        $activity->update([
            'title'      => $request->title,
            'video_link' => $request->paragraph,
        ]);

        // 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Video Gallery updated successfully!');
    }


    public function destroy($id)
    {
        $activity = VideoGallery::findOrFail($id);

        // 🖼️ Delete image file if exists
        if ($activity->post_image && file_exists(public_path($activity->post_image))) {
            unlink(public_path($activity->post_image));
        }

        // 🗑️ Delete the record
        $activity->delete();

        // 🔁 Redirect back with message
        return redirect()->back()->with('success', 'Video Gallery deleted successfully!');
    }


    /**
     * Toggle the status of a category.
     */
    public function toggleStatus($id)
    {
        $data = VideoGallery::findOrFail($id);
        $data->status = !$data->status;
        $data->save();

        return back()->with('success', 'Video Gallery status updated.');
    }
}
