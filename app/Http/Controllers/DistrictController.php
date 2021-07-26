<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index($id){
        $district = District::where('division_id', $id)->get();
        return response()->json($district, 200);
    }
}
