<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\PropertyController;


Route::get('/', function () {
    return view('master');
});

Route::get('/', [LoginController::class, ' login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('master', [MasterController::class, 'index'])->name('master')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
$user = Auth::user(); 



Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
Route::prefix('admin')->name('admin.')->group(function () {
    // Routes for Properti Rumah
    Route::get('/properti-rumah', [PropertyController::class, 'index'])->name('rumah.index');

    // Routes for Properti Villa
    Route::get('/properti-villa', [PropertyController::class, 'villaIndex'])->name('villa.index');

    // Add other routes related to admin if necessary
});