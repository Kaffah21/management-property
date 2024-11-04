<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\VillaController as AdminVillaController;
use App\Http\Controllers\Admin\RumahController as AdminRumahController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\VillaController;




Route::get('/', function () {  
    return view('master');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('master');
})->name('logout');


Route::get('master', [MasterController::class, 'index'])->name('master')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
$user = Auth::user(); 

Route::get('villas', [VillaController::class, 'index'])->name('villas.index');
Route::get('villas/{villa}', [VillaController::class, 'show'])->name('villas.show');

Route::get('/about', function () {
    return view('about');
})->name('about');




// ROUTE ADMIN

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
Route::prefix('admin')->name('admin.')->group(function () {
   
});
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('villas', AdminVillaController::class);
});

//add property home
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('rumah', AdminRumahController::class);
});
Route::get('/admin/rumah/{rumah}/edit', [RumahController::class, 'edit'])->name('admin.rumah.edit'); // Untuk menampilkan formulir edit
Route::patch('/admin/rumah/{rumah}', [RumahController::class, 'update'])->name('admin.rumah.update'); // Untuk mengirim data pembaruan

Route::get('rumah', [RumahController::class, 'index'])->name('rumahs.index');
Route::get('rumah/{rumah}', [RumahController::class, 'show'])->name('rumahs.show');