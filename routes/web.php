<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Font\HomeController;
use App\Http\Controllers\Font\accountController;
use App\Http\Controllers\Font\jobPostConroller;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Font\jobController;

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


Route::group([], function () {

  //Guest route

  Route::group(['middleware' => 'guest'], function () {
    Route::get('/account/registration', [accountController::class, 'Registration'])->name('registration');
    Route::post('/account/process-registration', [accountController::class, 'ProcessRegistration'])->name('account.process-registration');
    Route::post('account/authenticate', [accountController::class, 'authenticate'])->name('account.authenticate');
    Route::get('/account/login', [accountController::class, 'Login'])->name('account.login');
  });

  //Auth Route

  Route::group(['middleware' => 'auth'], function () {
    Route::get('account/profile', [accountController::class, 'Profile'])->name('account.profile');
    Route::get('/account/logout', [accountController::class, 'Logout'])->name('account.logout');
    Route::post('/account/profile/update', [accountController::class, 'ProfileUpdate'])->name('profile.update');
    Route::post('/update-profile-picture', [accountController::class, 'ProfilePictureUpdate'])->name('updateProfilePicture');
    Route::get('/Job-post', [jobController::class, 'CreateJob'])->name('Job.post');
    Route::post('/save-job', [jobController::class, 'storeJob'])->name('jobs.store');
    Route::get('/edit-job', [jobController::class, 'editJob'])->name('jobs.edit');
    Route::post('/update-job', [jobController::class, 'UpdateJob'])->name('jobs.update');
    Route::get('/my-job', [jobController::class, 'MyJob'])->name('my.job');
    Route::get('/find-job', [jobController::class, 'FindJobs'])->name('find.jobs');
  });
});