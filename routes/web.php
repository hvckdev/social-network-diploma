<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Blog\ArticleController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Jetstream\UserProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ScheduleController;
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
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], static function () {
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
    Route::resource('groups.announcements', AnnouncementController::class);
    Route::get('groups/{group}/schedule', [ScheduleController::class, 'index'])->name('groups.schedule');

    // Blog
    Route::resource('blog', BlogController::class);
    Route::resource('blog.article', ArticleController::class);
    Route::get('/blogs', [BlogController::class, 'showAll'])->name('blogs');
});
