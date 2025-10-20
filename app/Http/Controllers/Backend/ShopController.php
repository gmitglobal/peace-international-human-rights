<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $shops = Shop::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.shop.index', compact('shops'));
    }


    /**
     * Show the form for creating a category.
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255|unique:shops,name',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,svg|max:2048',
        ]);

        $data = [
            'owner_id' => Auth::user()->id,
            'name'  => $validated['name'],
            'logo' => $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null,
        ];

        Shop::create($data);

        return back()->with('success', 'Shop added successfully.');
    }

    /**
     * Upload image and return its path.
     */
    private function uploadImage($image)
    {
        $path = 'uploads/shops';
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($path), $filename);

        return $path . '/' . $filename;
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
