<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserAppealController;
use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\AdminAppealController;
use App\Http\Controllers\Admin\UserManagementController;

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


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->middleware('guest')->name('authenticate');

Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('store');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/category/{category}', 'category')->name('home.category');
    Route::get('/competition/{competition}', 'competition')->name('home.competition');
    
});

Route::group(['middleware' => 'admin'], function() {
    Route::group([
        'prefix' => 'admin',
        'namespace' => 'App\Http\Controllers\Admin',
        //'as' => 'admin.',
    ], function() {
        Route::resource('competitions', 'CompetitionController');
        Route::resource('categories', 'CategoryController');
        Route::resource('majors', 'MajorController');
        Route::resource('faculties', 'FacultyController');

        // Accept or Reject User's Appeal
        Route::post('competitions/{appeal}/accept', [AdminAppealController::class, 'store'])->name('admins.store');
        Route::delete('competitions/{appeal}/reject', [AdminAppealController::class, 'destroy'])->name('admins.destroy');


        Route::get('user-management', [UserManagementController::class, 'index'])->name('user-management.index');
        Route::get('user-management/create', [UserManagementController::class, 'create'])->name('user-management.create');
        Route::get('user-management/{user}', [UserManagementController::class, 'show'])->name('user-management.show');
        Route::post('user-management', [UserManagementController::class, 'store'])->name('user-management.store');
        Route::get('user-management/{user}/edit', [UserManagementController::class, 'edit'])->name('user-management.edit');
        Route::post('user-management/{user}', [UserManagementController::class, 'update'])->name('user-management.update');
        Route::delete('user-management/{user}', [UserManagementController::class, 'destroy'])->name('user-management.destroy');
       
    });
    
});

Route::group(['middleware' => 'user'], function() {
    Route::group([
        'prefix' => 'user',
        'namespace' => 'App\Http\Controllers\User',
        //'as' => 'admin.',
    ], function() {
        // User's Front Page / what they can do or see
        Route::get('dashboard', [UserController::class, 'index'])->name('users.index');
        Route::get('competitions/{competition}', [UserController::class, 'show'])->name('users.show');

        // Send Appeal to Admin
        Route::get('competitions/{competition}/create', [UserAppealController::class, 'create'])->name('users.create');
        Route::post('competitions/{competition}/appeal', [UserAppealController::class, 'store'])->name('users.appeal');
        Route::delete('competitions/{competition}/appeal', [UserAppealController::class, 'destroy'])->name('users.appeal');
        
    });
    
});






/*

Prefix Example : 
URL : 127.0.0.1:8000/admin/tasks
                      ^ PREFIX

What is 'as' => 'admin.' ?
<a href="{{ route('admin.tasks.index') }}>Task List</a>



Route::group(['middleware' => 'auth'], function() {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.',
    ], function() {
        Route::get('tasks',
        [\App\Http\Controllers\Admin\TaskController::class, 'index'])
        ->name('tasks.index');
    });
    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function() {
        Route::get('tasks',
        [\App\Http\Controllers\Admin\TaskController::class, 'index'])
        ->name('tasks.index');
    });
});

*/