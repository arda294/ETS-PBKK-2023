<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicalRecordController;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function() {
        return redirect('/dashboard');
    });

    Route::get('dashboard', function () {
        return view('dashboard.home');
    });
    
    Route::get('records', [MedicalRecordController::class, 'index']);
    Route::get('records/create', [MedicalRecordController::class, 'create']);
    Route::post('records/create', [MedicalRecordController::class, 'store']);

    Route::get('doctors', function() {
        return view('dashboard.doctors')->with('doctors', Doctor::all());
    });

    Route::get('patients', function() {
        return view('dashboard.patients')->with('patients', Patient::all());
    });
    
    Route::get('profile', function() {
        return view('dashboard.profile');
    });

    Route::get('users', [UserController::class, 'index']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'attemptLogin']);

