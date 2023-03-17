<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UpdatePasswordController;

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

Route::get('/',WelcomeController::class)->name('welcome');

Route::middleware('auth')->group(function () {

Route::get('timeline',TimelineController::class)->name('timeline');

Route::post('status',[StatusController::class,'store'])->name('status.store');

Route::prefix('profile')->group(function () {

Route::get('edit',[UpdateProfileController::class,'edit'])->name('profile.edit');
Route::put('update',[UpdateProfileController::class,'update'])->name('profile.update');

Route::get('edit/password',[UpdatePasswordController::class,'edit'])->name('password.edit');
Route::put('edit/password',[UpdatePasswordController::class,'update']);

Route::get('{user}/{following}',[FollowingController::class,'index'])->name('following');
Route::post('{user}',[FollowingController::class,'store'])->name('following.store');
// Route::get('profile/{user}/followers',[FollowingController::class,'followers'])->name('followers');
Route::get('{user}',ProfileController::class,'show')->name('profile')->withoutMiddleware('auth');
});

Route::get('explore',ExploreController::class)->name('explore');
});



require __DIR__.'/auth.php';
