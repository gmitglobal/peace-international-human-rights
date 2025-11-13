<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SupportRequest;
use Illuminate\Http\Request;

class SupportRequestController extends Controller
{
    public function index(Request $request)
    {
        $supportRequests = SupportRequest::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('problem', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.support-request.index', compact('supportRequests'));
    }


    public function toggleStatus($id)
    {
        $status = SupportRequest::findOrFail($id);
        $status->status = !$status->status;
        $status->save();

        return back()->with('success', 'Status updated.');
    }
}
