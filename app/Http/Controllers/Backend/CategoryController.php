<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories with optional search.
     */
    public function index(Request $request)
    {
        $categories = Category::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a category.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a new category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255|unique:categories,name',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,svg|max:2048',
        ]);

        $data = [
            'name'  => $validated['name'],
            'slug'  => Str::slug($validated['name']),
            'image' => $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null,
        ];

        Category::create($data);

        return back()->with('success', 'Category added successfully.');
    }

    /**
     * Show the form for editing a category.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update an existing category.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,svg|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['name']);

        if ($request->hasFile('image')) {
            $this->deleteImage($category->image);
            $category->image = $this->uploadImage($request->file('image'));
        }

        $category->save();

        return back()->with('success', 'Category updated successfully.');
    }

    /**
     * Delete a category and its images.
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $this->deleteImage($category->image);
        $this->deleteImage($category->thumb_image);

        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }

    /**
     * Toggle the status of a category.
     */
    public function toggleStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->save();

        return back()->with('success', 'Category status updated.');
    }

    /**
     * Upload image and return its path.
     */
    private function uploadImage($image)
    {
        $path = 'uploads/categories';
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
