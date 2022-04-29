<?php

use App\Http\Controllers\Admin\AdminChangePasswordController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\contactUs\ContactUsController;
use App\Http\Controllers\employer\EmployerChangePasswordController;
use App\Http\Controllers\employer\EmployerLoginController;
use App\Http\Controllers\employer\EmployerController;
use App\Http\Controllers\job\JobController;
use App\Http\Controllers\welcome\WelcomeController;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.view');
    Route::post('/login', [LoginController::class, 'adminLogin'])->name('admin.login');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::view('/dashboard', 'admin.dashBoard')->name('admin.dash');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        // Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        // Route::put('/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::view('/change-password', 'admin.changePassword')->name('admin.change-password.view');
        Route::post('/change-password', [AdminChangePasswordController::class, 'store'])->name('admin.password');

        // Route::get('/jobtypes', [JobTypeController::class, 'index'])->name('jobtype.index');

        // Route::get('/cities', [CityController::class, 'index'])->name('city.index');

        Route::get('employers', [EmployerController::class, 'index'])->name('employer.index');
        Route::get('employers/create', [EmployerController::class, 'create'])->name('employer.create');
        Route::get('employers/edit/{id}', [EmployerController::class, 'adminEdit'])->name('employer.admin.edit');
        Route::post('employers/store', [EmployerController::class, 'store'])->name('employer.store');
        Route::get('employers/show/{id}', [EmployerController::class, 'show'])->name('employer.show');
        Route::put('employers/{id}', [EmployerController::class, 'adminUpdate'])->name('employer.admin.update');
        Route::delete('employers/{id}', [EmployerController::class, 'destroy'])->name('employer.destroy');

        // Route::get('job-categories', [JobCategoriesController::class, 'index'])->name('categories.index');

        // Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
        // Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
        // Route::get('jobs/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
        // Route::post('/jobs/store', [JobController::class, 'store'])->name('job.store');
        // Route::put('/jobs/{id}', [JobController::class, 'update'])->name('job.update');
        // Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('job.destroy');

        Route::get('/feedback-queries', [ContactUsController::class, 'index'])->name('contact.index');
        Route::get('/feedback-queries/{id}', [ContactUsController::class, 'destroy'])->name('contact.destroy');
    });
});

Route::group(['prefix' => 'employer'], function () {
    Route::get('/login', [EmployerLoginController::class, 'showEmployerLoginForm'])->name('employer.view');
    Route::post('/login', [EmployerLoginController::class, 'employerLogin'])->name('employer.login');
    // Route::view('/dashboard', 'employer.dashBoard')->name('employer.dash');

    Route::group(['middleware' => 'auth:employer'], function () {
        // Route::view('/dashboard', 'employer.dashBoard')->name('employer.dash');
        Route::get('/dashboard', [EmployerLoginController::class, 'dashboard'])->name('employer.dash');

        Route::get('/logout', [EmployerLoginController::class, 'logout'])->name('employer.logout');

        Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
        Route::get('jobs/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
        Route::post('/jobs/store', [JobController::class, 'store'])->name('job.store');
        Route::put('/jobs/{id}', [JobController::class, 'update'])->name('job.update');
        Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('job.destroy');

        Route::view('/change-password', 'employer.auth.changePassword')->name('employer.change-password.view');
        Route::post('/change-password', [EmployerChangePasswordController::class, 'changePassword'])->name('employer.password');

        Route::get('/edit/{id}', [EmployerController::class, 'edit'])->name('employer.edit');
        Route::post('/image/{id}', [EmployerController::class, 'logoUpload'])->name('employer.logo');
        Route::post('/pan/{id}', [EmployerController::class, 'panUpload'])->name('employer.pan');
        Route::put('/{id}', [EmployerController::class, 'update'])->name('employer.update');
    });
});
Route::get('/', function () {
    return view('welcome');
});
Route::view('/contact-us', 'frontend.contact')->name('frontend.contactUs');
Route::view('/about-us', 'frontend.about')->name('frontend.about');
Route::post('/contact-us/store', [ContactUsController::class, 'store'])->name('contact.post');
Route::get('/view-job/{id}', [WelcomeController::class, 'singleJob'])->name('single.job.view');
Route::get('/employer/signup', [EmployerController::class, 'signup'])->name('employer.signup');
Route::post('/employer/register', [EmployerController::class, 'register'])->name('employer.register');
Route::get('/search', [WelcomeController::class, 'searchJob'])->name('job.search');
Route::get('/advance-search', [WelcomeController::class, 'advanceSearch'])->name('job.advance.search');
