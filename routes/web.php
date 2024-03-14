<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Font\HomeController;
use App\Http\Controllers\Font\accountController;
use App\Http\Controllers\Font\jobPostConroller;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Font\jobController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\userController;

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

  Route::group(['prefix' => 'admin', 'middleware' => 'checkrole'], function () {
    Route::get('dashboard', [dashboardController::class, 'Dashboard'])->name('admin.dashboard');
    Route::get('user-list', [userController::class, 'index'])->name('admin.users.list');
    Route::get('user-create', [userController::class, 'create'])->name('admin.users.create');
    Route::get('user-edit/{id}', [userController::class, 'edit'])->name('admin.users.edit');
    Route::post('user-update/{id}', [userController::class, 'update'])->name('admin.users.update');
    Route::get('user-delete/{id}', [userController::class, 'delete'])->name('admin.users.delete');

    //job related routes

    Route::get('job-list', [jobController::class, 'index'])->name('admin.jobs.list');
    Route::get('job-create', [jobController::class, 'create'])->name('admin.jobs.create');
    Route::get('job-edit/{id}', [jobController::class, 'edit'])->name('admin.jobs.edit');
    Route::post('job-update/{id}', [jobController::class, 'update'])->name('admin.jobs.update');
    Route::get('job-delete/{id}', [jobController::class, 'delete'])->name('admin.jobs.delete');
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
    Route::get('/delete-job', [jobController::class, 'DeleteJob'])->name('jobs.delete');
    Route::get('/job-details/{id}', [jobController::class, 'JobDetails'])->name('job.details');
    Route::get('/apply-job', [jobController::class, 'ApplyJob'])->name('apply.job');
    Route::post('/apply-job', [jobController::class, 'ApplyJobStore'])->name('apply.job.store');
  });
});
