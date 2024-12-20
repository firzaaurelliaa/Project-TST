<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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


Route::get('/events/list', [EventController::class, 'listEvents'])->name('events.list');
Route::get('/events', [EventController::class, 'showEvents'])->name('events.index');
Route::get('/events/{id}/detail', [EventController::class, 'detailEvents'])->name('events.detail');

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

// Route::get('/events/{id}/detail', [EventController::class, 'detailEvents'])->name('events.detail');
// Route::get('/detail', [EventController::class, 'show'])->name('detail.show');
// Route::get('/events/{id}', [EventController::class, 'detailEvents'])->name('events.detail');
// // Route::get('/events/{id}', [EventController::class, 'detailEvents']);
// Route::get('/event/{id}', [EventController::class, 'detailEvents'])->name('events.detail');

// Route Dashboard
Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');