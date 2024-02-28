<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Font\HomeController;
use App\Http\Controllers\Font\accountController;
use App\Http\Controllers\Font\jobPostConroller;

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

Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/account/registration', [accountController::class, 'Registration'])->name('registration');
Route::post('/account/process-registration', [accountController::class, 'ProcessRegistration'])->name('account.process-registration');
Route::get('/account/login', [accountController::class, 'Login'])->name('login');
Route::post('account/authenticate', [accountController::class, 'authenticate'])->name('account.authenticate');
Route::get('account/authenticate/profile', [accountController::class, 'Profile'])->name('account.profile');
Route::get('/account/logout', [accountController::class, 'Logout'])->name('logout');
Route::get('/dashboard', [accountController::class, 'Dashboard'])->name('dashboard');
Route::get('/job-post', [jobPostConroller::class, 'Job_post'])->name('job-post');
