<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getData($type, $id = null)
    {
        switch ($type) {
            case 'divisions':
                return response()->json(Division::select('id', 'name')->get());

            case 'districts':
                if (!$id) return response()->json([]);
                return response()->json(District::where('division_id', $id)->select('id', 'name')->get());

            case 'thanas':
                if (!$id) return response()->json([]);
                return response()->json(Thana::where('district_id', $id)->select('id', 'name')->get());

            default:
                return response()->json(['error' => 'Invalid request type'], 400);
        }
    }
}
