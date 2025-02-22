<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
    //User rutes
});

//Admin routes
Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('/admin')->group(function () {

    Route::controller(UsersController::class)->prefix('/user')->name('user.')->group(function () {

        Route::get('all', 'allUsers')->name('all');
        Route::get('delete/{user}', 'deleteUser')->name('delete');
        Route::get("block/{user}", 'blockUser')->name('block');
        Route::get("activate/{user}", 'activateUser')->name('activate');
    });

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->name('profile.')->group(function () {

        Route::get('/profile', 'edit')->name('edit');
        Route::patch('/profile', 'update')->name('update');
        Route::delete('/profile', 'destroy')->name('destroy');
    });
});

require __DIR__.'/auth.php';
