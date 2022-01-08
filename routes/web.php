<?php

use App\Http\Controllers\GroupController;
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
    Route::post('user/profile/update-information', [UserProfileController::class, 'updateUserProfileInformation'])
        ->name('update-user-information');
    Route::post('user/profile/update-password', [UserProfileController::class, 'updateUserPassword'])
        ->name('update-user-password');

    // Users
    Route::resource('user-info', UserInformationController::class);
    Route::resource('users', UserController::class);

    // Group
    Route::resource('groups', GroupController::class);
    Route::post('groups/{group}/add-users', [GroupController::class, 'addUserToGroup'])
        ->name('groups.add-users');
});
