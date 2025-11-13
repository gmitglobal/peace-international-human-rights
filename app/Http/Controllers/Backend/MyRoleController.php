<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MyRole;
use Illuminate\Http\Request;
use Str;

class MyRoleController extends Controller
{
    /**
     * Display a listing of categories with optional search.
     */
    public function index(Request $request)
    {
        $myroles = MyRole::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.my-roles.index', compact('myroles'));
    }

    /**
     * Show the form for creating a category.
     */
    public function create()
    {
        return view('admin.my-roles.create');
    }

    /**
     * Store a new category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:my_roles,name',
        ]);

        $data = [
            'name' => $validated['name'],
        ];

        MyRole::create($data);

        return back()->with('success', 'My Role added successfully.');
    }

    /**
     * Show the form for editing a myrole.
     */
    public function edit($id)
    {
        $myrole = MyRole::findOrFail($id);
        return view('admin.my-roles.edit', compact('myrole'));
    }

    /**
     * Update an existing category.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:my_roles,name,' . $id,
        ]);

        $data = MyRole::findOrFail($id);
        $data->name = $validated['name'];

        $data->save();

        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Delete a category and its images.
     */
    public function destroy(Request $request)
    {
        $delItem = MyRole::findOrFail($request->id);
        $delItem->delete();

        return back()->with('success', 'Deleted Successfully.');
    }

    /**
     * Toggle the status of a category.
     */
    public function toggleStatus($id)
    {
        $toggleStatus = MyRole::findOrFail($id);
        $toggleStatus->status = !$toggleStatus->status;
        $toggleStatus->save();

        return back()->with('success', 'Status updated.');
    }



    // admin.users.updateRole

    public function updateRole($id)
    {
        $toggleStatus = MyRole::findOrFail($id);
        $toggleStatus->status = !$toggleStatus->status;
        $toggleStatus->save();

        return back()->with('success', 'Status updated.');
    }
}
