<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MemberListController extends Controller
{
    public function index(Request $request)
    {
        $donation_members = Donation::get();
        $members = User::paginate(8);

        $donation_member_arr = [];
        $member_arr = [];

        foreach ($donation_members as $donation_member) {
            $donation_member_arr[] = [
                'name'     => $donation_member->name,
                'division' => $donation_member->division->name,
                'district' => $donation_member->district->name,
                'thana'    => $donation_member->thana->name
            ];
        }

        foreach ($members as $member) {
            $member_arr[] = [
                'name'     => $member->name,
                'division' => $member->division,
                'district' => $member->district,
                'thana'    => $member->thana,
            ];
        }

        $results = array_merge($donation_member_arr, $member_arr);


        // Convert to collection
        $collection = collect($results);

        // Paginate manually (10 items per page)
        $perPage = 10;
        $currentPage = request()->get('page', 1);

        $paginatedData = new LengthAwarePaginator(
            $collection->forPage($currentPage, $perPage),
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );

        return view('admin.member-list.index', compact('paginatedData'));
    }
}
