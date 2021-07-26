<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $divisions = App\Models\Divsion::all();
    return view('welcome', compact('divisions'));
});



use App\Http\Controllers\DistrictController;
Route::get('district/{id}', [DistrictController::class, 'index']);

use App\Http\Controllers\UpozilaController;
Route::get('upozila/{id}', [UpozilaController::class, 'index']);

use App\Http\Controllers\GoogleController;
Route::get('auto-complete', [GoogleController::class, 'index']);
