<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Expense;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_donation = Donation::where('status', 1)
            ->whereNotNull('cal_amount')
            ->sum('cal_amount');

        $total_expense = Expense::sum('amount');

        return view('admin.index', compact('total_donation', 'total_expense'));
    }
}
