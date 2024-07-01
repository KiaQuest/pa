<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FollowController;

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

Route::get('/profile', [FollowController::class, 'index'])->name('profile.index');
Route::post('/follow-profile', [FollowController::class, 'follow'])->name('profile.follow');
Route::post('/unfollow-profile', [FollowController::class, 'unfollow'])->name('profile.unfollow');


Route::get('/check_follow/{id?}', [FollowController::class, 'check_follow'])->name('profile.check.follow');
