<?php

use App\Http\Controllers\Jetstream\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInformationController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // Jetstream
    Route::post('user/{user}/update-information', [UserProfileController::class, 'editProfileInformation'])
    ->name('update-user-information');

    // Users
    Route::resource('user-info', UserInformationController::class);
    Route::resource('users', UserController::class);
});
