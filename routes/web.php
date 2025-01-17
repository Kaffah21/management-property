<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FaqController;  
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\VillaController as AdminVillaController;
use App\Http\Controllers\Admin\RumahController as AdminRumahController;
use App\Http\Controllers\Admin\PemilikController as PemilikController;
use App\Http\Controllers\Admin\PenyewaController as PenyewaController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;


Route::get('/', function () {   
    return view('master');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('master');
})->name('logout');


Route::get('master', [MasterController::class, 'index'])->name('master');

// Route::get('master', [MasterController::class, 'index'])->name('master')->middleware('auth');

// Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
// Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
// Route::get('/register', [RegisterController::class, 'register'])->name('register');
// Route::get('/register', [RegisterController::class, 'create'])->name('register');
// Route::post('/register', [RegisterController::class, 'store']);
// $user = Auth::user(); 
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('villas', [VillaController::class, 'index'])->name('villas.index');
Route::get('villas/{villa}', [VillaController::class, 'show'])->name('villas.show');
Route::get('/villas/{villa}/booking', [VillaController::class, 'showBookingForm'])->name('villas.booking');
// Route::post('/villas/{villa}/booking', [VillaController::class, 'bookVilla'])->name('villas.book');
Route::post('/villas/{id}/book', [VillaController::class, 'bookVilla'])->name('villas.book');
Route::get('/payment/success/{id}', [VillaController::class, 'paymentSuccess']);
Route::get('/payment/pending/{id}', [VillaController::class, 'paymentPending']);
Route::get('/payment/failed/{id}', [VillaController::class, 'paymentFailed']);
Route::post('/payment/notification', [VillaController::class, 'paymentNotification']);
Route::post('/midtrans-notification', [VillaController::class, 'midtransNotification']);

Route::get('/payment/success', function () {
    return view('payment.success'); 
});
Route::get('/payment/pending', function () {
    return view('payment.pending'); 
});
Route::get('/payment/history', [VillaController::class, 'paymentHistory'])->name('payment.history')->middleware('auth');

Route::post('/payment', [PaymentController::class, 'handlePayment'])->name('payment.handle');
Route::post('/payment/callback', [PaymentController::class, 'midtransCallback']);


Route::get('rumah', [RumahController::class, 'index'])->name('rumahs.index');
Route::get('rumah/{rumah}', [RumahController::class, 'show'])->name('rumahs.show');
Route::get('rumah/{id}', [RumahController::class, 'show']);
Route::post('/rumah/{id}/book', [RumahController::class, 'bookRumah'])->name('rumahs.book');
Route::post('/midtrans/notification', [RumahController::class, 'notificationHandler'])->name('midtrans.notification');
Route::get('rumah/{id}/booking', [RumahController::class, 'showBookingForm']);
Route::get('payment/success', [RumahController::class, 'paymentSuccess']);
Route::get('payment/pending', [RumahController::class, 'paymentPending']);


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact.form');

Route::post('/contact-us', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/search', [MasterController::class, 'search'])->name('search');

Route::get('/privacy-policy',function(){
return view('Property.privacy-policy');
});

Route::resource('faq', FaqController::class); 

Route::get('term-condition',function(){
    return view('Property.term-condition');
});
Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// ROUTE ADMIN

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    });
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('villas', AdminVillaController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('rumah', AdminRumahController::class);
});

Route::get('/admin/rumah/{id}/edit', [RumahController::class, 'edit'])->name('admin.rumah.edit');
Route::patch('/admin/rumah/{rumah}', [RumahController::class, 'update'])->name('admin.rumah.update');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('penyewa', PenyewaController::class);
    Route::resource('pemilik', PemilikController::class);
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/transaksi/rumah', [TransaksiController::class, 'index'])->name('transaksi.rumah');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class);
});

Route::prefix('admin')->name('admin.faq.')->middleware('auth')->group(function () {
    Route::resource('faq', AdminFaqController::class);
    Route::get('/faq/create', [AdminFaqController::class, 'create'])->name('create');
    Route::post('/faq', [AdminFaqController::class, 'store'])->name('store');
    Route::get('/faq/{faq}/edit', [AdminFaqController::class, 'edit'])->name('edit');
    Route::delete('/faq/{faq}', [AdminFaqController::class, 'destroy'])->name('destroy');
    Route::get('/faq', [AdminFaqController::class, 'index'])->name('index');
    Route::put('/faq/{faq}', [AdminFaqController::class, 'update'])->name('update');
});

