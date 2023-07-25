<?php
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\Auth\RegisteredAdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CepController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedLoginController;
use App\Http\Controllers\AdminUserController;



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



#Cadastro e Dashboard de User
Route::get('/cadastro-user', [RegisteredUserController::class, 'create'])->name('cadastro-user');
Route::post('/cadastro-user', [RegisteredUserController::class, 'store']);

Route::get('/dashboard-user', [DashboardUserController::class, 'index'])->name('dashboard-user');
Route::post('/dashboard-user', [DashboardUserController::class, 'index'])->name('dashboard-user');


#Cadastro e Dashboard de Admin
Route::get('/cadastro-admin', [RegisteredAdminController::class, 'create'])->name('cadastro-admin');
Route::post('/cadastro-admin', [RegisteredAdminController::class, 'store'])->name('dashboard-admin');


Route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('dashboard-admin');
Route::post('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('dashboard-admin');


#Tela de login
Route::get('/login', [AuthenticatedLoginController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedLoginController::class, 'store']);



Route::get('/', function () {
    return view('landing-page');
})->name('landing');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/dashboard-admin', [AdminUserController::class, 'index'])->name('dashboard-admin');

Route::get('/users/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');
