<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of with optional search.
     */
    public function index(Request $request)
    {
        $expenses = Expense::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('title', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();


        $total_sum = Expense::sum('amount');

        return view('admin.expense.index', compact('expenses', 'total_sum'));
    }

    /**
     * Show the form for creating a category.
     */
    public function create()
    {
        return view('admin.expense.create');
    }

    public function store(Request $request)
    {
        ## ✅ Validate form input
        $request->validate([
            'date'        => 'required',
            'title'       => 'required|string|max:255',
            'amount'      => 'required|string|max:255',
            'description' => 'required|string',
            'post_image'  => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:1024000',
        ]);

        ## 🖼️ Handle image upload
        $postImagePath = null;
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/expenses'), $imageName);
            $postImagePath = 'uploads/expenses/' . $imageName;
        }

        ## 💾 Save data to database
        Expense::create([
            'user_id'     => Auth::id(), ## logged-in user
            'date'        => $request->date,
            'title'       => $request->title,
            'amount'      => $request->amount,
            'description' => $request->description,
            'post_image'  => $postImagePath,
        ]);

        ## 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Expense added successfully!');
    }

    /**
     * Show the form for editing a category.
     */
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('admin.expense.edit', compact('expense'));
    }


    public function update(Request $request, $id)
    {
        $activity = Expense::findOrFail($id);

        // ✅ Validate input
        $request->validate([
            'date'        => 'required',
            'title'       => 'required|string|max:255',
            'amount'      => 'required|string|max:255',
            'description' => 'required|string',
            'post_image'  => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:1024000',
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
            $image->move(public_path('uploads/expenses'), $imageName);

            $postImagePath = 'uploads/expenses/' . $imageName;
        }

        // 💾 Update the record
        $activity->update([
            'date'        => $request->date,
            'title'       => $request->title,
            'amount'      => $request->amount,
            'description' => $request->description,
            'post_image'  => $postImagePath,
        ]);

        // 🔁 Redirect back with success message
        return redirect()->back()->with('success', 'Item updated successfully!');
    }


    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);

        // 🖼️ Delete image file if exists
        if ($expense->post_image && file_exists(public_path($expense->post_image))) {
            unlink(public_path($expense->post_image));
        }

        // 🗑️ Delete the record
        $expense->delete();

        // 🔁 Redirect back with message
        return redirect()->back()->with('success', 'Item deleted successfully!');
    }
}
