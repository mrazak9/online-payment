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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('faculties', 'App\Http\Controllers\FacultyController');
Route::resource('program_studies', 'App\Http\Controllers\ProgramStudyController');
Route::resource('concentrations', 'App\Http\Controllers\ConcentrationController');
Route::resource('frequencies', 'App\Http\Controllers\FrequencyController');
Route::resource('frequencies', 'App\Http\Controllers\FrequencyController');
Route::resource('discounts', 'App\Http\Controllers\DiscountController');
// Route::get('/faculties',[App\Http\Controllers\FacultyController::class,'index']);

