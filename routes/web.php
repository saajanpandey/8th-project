<?php

use App\Http\Controllers\Admin\AdminChangePasswordController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\city\CityController;
use App\Http\Controllers\employeer\EmployeerController;
use App\Http\Controllers\employeer\EmployerLoginController;
use App\Http\Controllers\job\JobController;
use App\Http\Controllers\jobCategories\JobCategoriesController;
use App\Http\Controllers\jobType\JobTypeController;
use App\Models\JobCategories;
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

Route::get('/', function () {
    return view('welcome');
});

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

        Route::get('/jobtypes', [JobTypeController::class, 'index'])->name('jobtype.index');

        Route::get('/cities', [CityController::class, 'index'])->name('city.index');

        Route::get('employers', [EmployeerController::class, 'index'])->name('employer.index');
        Route::get('employers/create', [EmployeerController::class, 'create'])->name('employer.create');
        Route::get('employers/edit/{id}', [EmployeerController::class, 'edit'])->name('employer.edit');
        Route::post('employers/store', [EmployeerController::class, 'store'])->name('employer.store');
        Route::post('employers/image/{id}', [EmployeerController::class, 'logoUpload'])->name('employer.logo');
        Route::post('employers/pan/{id}', [EmployeerController::class, 'panUpload'])->name('employer.pan');
        Route::put('employers/{id}', [EmployeerController::class, 'update'])->name('employer.update');
        Route::get('employers/show/{id}', [EmployeerController::class, 'show'])->name('employer.show');
        Route::delete('employers/{id}', [EmployeerController::class, 'destroy'])->name('employer.destroy');

        Route::get('job-categories', [JobCategoriesController::class, 'index'])->name('categories.index');

        Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
        Route::get('jobs/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
        Route::post('/jobs/store', [JobController::class, 'store'])->name('job.store');
        Route::put('/jobs/{id}', [JobController::class, 'update'])->name('job.update');
        Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('job.destroy');
    });
});

Route::group(['prefix' => 'employer'], function () {
    Route::get('/login', [EmployerLoginController::class, 'showEmployerLoginForm'])->name('employer.view');
    Route::post('/login', [EmployerLoginController::class, 'adminLogin'])->name('employer.login');

    Route::group(['middleware' => 'auth:employer'], function () {
    });
});
