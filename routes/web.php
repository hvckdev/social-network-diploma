<?php

use App\Http\Controllers\Blog\ArticleController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Jetstream\UserProfileController;
use App\Http\Controllers\MessageController;
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

Route::get('/', static function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], static function () {
    // Jetstream
    Route::post('user/profile/update-information', [UserProfileController::class, 'updateUserProfileInformation'])
        ->name('update-user-information');
    Route::post('user/profile/update-password', [UserProfileController::class, 'updateUserPassword'])
        ->name('update-user-password');

    // Users
    Route::resource('user-info', UserInformationController::class);
    Route::resource('users', UserController::class);

    // Friendship
    Route::get('friends', [FriendController::class, 'index'])->name('friends.index');

    // Messages
    Route::resource('threads', MessageController::class);

    // Group
    Route::resource('groups', GroupController::class);
    Route::post('groups/{group}/add-users', [GroupController::class, 'addUserToGroup'])
        ->name('groups.add-users');

    // Blog
    Route::resource('blog', BlogController::class);
    Route::resource('blog.article', ArticleController::class);
});
