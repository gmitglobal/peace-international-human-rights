<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ReferTable;
use App\Models\User;
use Illuminate\Http\Request;

class ReferController extends Controller
{
    public function index(Request $request, $id)
    {
        // $users = User::with('referTable')->where('refered_by', $id)->paginate(10);
        $users = User::where('refered_by', $id)->paginate(10);
        
        // Return to view
        return view('admin.refer-list.index', compact('users'));
    } ## End Mehtod
}
