<?php

use App\Http\Controllers\Admin\AdminChangePasswordController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\city\CityController;
use App\Http\Controllers\employeer\EmployeerController;
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
    
        Route::get('employeers', [EmployeerController::class, 'index'])->name('employeer.index');
        Route::get('employeers/create', [EmployeerController::class, 'create'])->name('employeer.create');
        Route::get('employeers/edit/{id}', [EmployeerController::class, 'edit'])->name('employeer.edit');
        Route::post('employeers/store', [EmployeerController::class, 'store'])->name('employeer.store');
        Route::post('employeers/image/{id}', [EmployeerController::class, 'logoUpload'])->name('employeer.logo');
        Route::post('employeers/pan/{id}', [EmployeerController::class, 'panUpload'])->name('employeer.pan');
        Route::put('employeers/{id}', [EmployeerController::class, 'update'])->name('employeer.update');
        Route::get('employeers/show/{id}', [EmployeerController::class, 'show'])->name('employeer.show');
        Route::delete('employeers/{id}', [EmployeerController::class, 'destroy'])->name('employeer.destroy');

        Route::get('job-categories', [JobCategoriesController::class, 'index'])->name('categories.index');
    });
});
