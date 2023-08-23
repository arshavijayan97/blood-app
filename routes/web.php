<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BloodDonationController as BloodDonationController;
use App\Http\Controllers\User\DonationController as DonationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// for Admin 
Route::prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin_dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/blood-donations/list', [BloodDonationController::class, 'index'])->name('donation.index');
    Route::get('/blood-donations/create', [BloodDonationController::class, 'create'])->name('donation.create');
    Route::post('/blood-donations', [BloodDonationController::class, 'store'])->name('donation.save');
    Route::get('/blood-donations/{id}/edit', [BloodDonationController::class, 'edit'])->name('donation.edit');
    Route::post('/blood-donations/{id}', [BloodDonationController::class, 'update'])->name('donation.update');
    Route::post('/blood-donations/{id}', [BloodDonationController::class, 'destroy'])->name('donation.destroy');
});
// for Users 
Route::prefix('user')->middleware(['auth', 'role:0'])->group(function () {
    Route::get('/user_dashboard', [UserDashboardController::class, 'index'])->name('user.home');
    Route::get('/blood-donations/list', [DonationController::class, 'index'])->name('user.list');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
