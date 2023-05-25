<?php

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

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('donor-dashboard');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile-store', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile-store');
Route::post('/upload-profile', [App\Http\Controllers\ProfileController::class, 'uploadPicture'])->name('upload-profile');

Route::get('/claim-rewards', [App\Http\Controllers\ClaimRewardController::class, 'index'])->name('claim-rewards');
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');

Route::get('/admin', [\App\Http\Controllers\AdminController::class,'index']);

Route::get('/admin/events', [\App\Http\Controllers\EventsController::class,'index'])->name('events');
Route::get('/admin/events/create', [\App\Http\Controllers\EventsController::class,'create'])->name('events-create');
Route::post('/admin/events/create', [\App\Http\Controllers\EventsController::class,'store'])->name('events-store');
Route::get('/admin/events/edit/{id}', [\App\Http\Controllers\EventsController::class,'edit'])->name('events-edit');
Route::get('/admin/events/remove/{id}', [\App\Http\Controllers\EventsController::class,'delete'])->name('events-remove');
Route::get('/admin/events/points/{id}', [\App\Http\Controllers\EventsController::class,'points'])->name('events-points');
Route::post('/admin/events/points/{id}', [\App\Http\Controllers\EventsController::class,'pointsToDonor'])->name('events-points-to-donor');



Route::get('/admin/rewards', [\App\Http\Controllers\RewardsController::class,'index'])->name('rewards');
Route::get('/admin/rewards/create', [\App\Http\Controllers\RewardsController::class,'create'])->name('rewards-create');
Route::post('/admin/rewards/create', [\App\Http\Controllers\RewardsController::class,'store'])->name('rewards-store');
Route::get('/admin/rewards/edit/{id}', [\App\Http\Controllers\RewardsController::class,'edit'])->name('rewards-edit');
Route::get('/admin/rewards/remove/{id}', [\App\Http\Controllers\RewardsController::class,'delete'])->name('rewards-remove');

Route::get('/admin/donors', [\App\Http\Controllers\DonorController::class,'index'])->name('donors');
