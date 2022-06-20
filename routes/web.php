<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, UserController, AttendanceController};

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
    $user = User::all()->count();
    return view('layout', compact('user'));
});
Route::get('/attendance', function () {
    return view('pages.attendance.index');
});

Auth::routes();

Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::resource('user', UserController::class)->middleware(['auth', 'is_admin']);
Route::resource('attendance', AttendanceController::class)->middleware(['auth', 'is_admin']);
