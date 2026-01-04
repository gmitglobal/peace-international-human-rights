<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of categories with optional search.
     */
    public function index(Request $request)
    {
        $sliders = Slider::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a category.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(Request $request)
    {
        // ✅ Validate all input fields
        $request->validate([
            'title'             => 'nullable|string|max:255',
            'subtitle'          => 'nullable|string|max:500',
            'button1_text'      => 'nullable|string|max:100',
            'button1_link'      => 'nullable|string|max:255',
            'button2_text'      => 'nullable|string|max:100',
            'button2_link'      => 'nullable|string|max:255',
            'background_image'  => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'logo_image'        => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        // 🖼️ Handle background image upload
        $backgroundPath = null;
        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $filename = time() . '_bg.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $backgroundPath = 'uploads/sliders/' . $filename;
        }

        // 🖼️ Handle logo image upload
        $logoPath = null;
        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $logoPath = 'uploads/sliders/' . $filename;
        }

        // 💾 Store data in database
        Slider::create([
            'title'            => $request->title,
            'subtitle'         => $request->subtitle,
            'button1_text'     => $request->button1_text,
            'button1_link'     => $request->button1_link,
            'button2_text'     => $request->button2_text,
            'button2_link'     => $request->button2_link,
            'background_image' => $backgroundPath,
            'logo_image'       => $logoPath,
            'status'           => 1,
            'sort_order'       => 0,
        ]);

        // 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Slider added successfully!');
    }

    public function destroy($id)
    {
        // 🔍 Find the slider by ID
        $slider = Slider::findOrFail($id);

        // 🧹 Delete background image if exists
        if ($slider->background_image && File::exists(public_path($slider->background_image))) {
            File::delete(public_path($slider->background_image));
        }

        // 🧹 Delete logo image if exists
        if ($slider->logo_image && File::exists(public_path($slider->logo_image))) {
            File::delete(public_path($slider->logo_image));
        }

        // 🗑️ Delete the slider record
        $slider->delete();

        // 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Slider deleted successfully!');
    }


    /**
     * Show the form for editing a category.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        // ✅ Validate inputs
        $request->validate([
            'title'             => 'nullable|string|max:255',
            'subtitle'          => 'nullable|string|max:500',
            'button1_text'      => 'nullable|string|max:100',
            'button1_link'      => 'nullable|string|max:255',
            'button2_text'      => 'nullable|string|max:100',
            'button2_link'      => 'nullable|string|max:255',
            'background_image'  => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'logo_image'        => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        // 🖼️ Update background image
        if ($request->hasFile('background_image')) {
            if ($slider->background_image && file_exists(public_path($slider->background_image))) {
                unlink(public_path($slider->background_image));
            }

            $file = $request->file('background_image');
            $filename = time() . '_bg.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $slider->background_image = 'uploads/sliders/' . $filename;
        }

        // 🖼️ Update logo image
        if ($request->hasFile('logo_image')) {
            if ($slider->logo_image && file_exists(public_path($slider->logo_image))) {
                unlink(public_path($slider->logo_image));
            }

            $file = $request->file('logo_image');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $slider->logo_image = 'uploads/sliders/' . $filename;
        }

        // 💾 Update other fields
        $slider->update([
            'title'        => $request->title,
            'subtitle'     => $request->subtitle,
            'button1_text' => $request->button1_text,
            'button1_link' => $request->button1_link,
            'button2_text' => $request->button2_text,
            'button2_link' => $request->button2_link,
        ]);

        return redirect()->back()->with('success', 'Slider updated successfully!');
    }
}
