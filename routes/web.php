<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\RegisteredAdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CepController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/consulta-cep/{cep}', [CepController::class, 'consultaCep'])->name('consultaCep');

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/dashboard-admin', [UserController::class, 'index'])->name('dashboard-admin');
});

Route::middleware(['auth', 'can:user'])->group(function () {
    Route::get('/dashboard-user', [UserController::class, 'index'])->name('dashboard-user');
});

Route::get('/cadastro-admin', [RegisteredAdminController::class, 'create'])->name('cadastro-admin');
Route::post('/cadastro-admin', [RegisteredAdminController::class, 'store']);

Route::get('/cadastro-user', [RegisteredUserController::class, 'create'])->name('cadastro-user');
Route::post('/cadastro-user', [RegisteredUserController::class, 'store']);

// Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
// Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');



// Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard-admin');
// Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('dashboard-user');

// Route::get('/cadastro/user', [RegisterController::class, 'showUserRegistrationForm'])->name('register.user');
// Route::get('/cadastro/admin', [RegisterController::class, 'showAdminRegistrationForm'])->name('register.admin');
