<?php

namespace App\Http\Controllers;

use App\Models\Upozila;
use Illuminate\Http\Request;

class UpozilaController extends Controller
{
    public function index($id){
        $district = Upozila::where('district_id', $id)->get();
        return response()->json($district, 200);
    }
}
