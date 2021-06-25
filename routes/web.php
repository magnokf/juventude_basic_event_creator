<?php

use App\Http\Controllers\EventOneController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/eventone', [EventOneController::class, 'create'])->name('inscricao');
Route::resource('event_one', EventOneController::class)->except(['destroy', 'update']);
Route::get('/confirmation-event/{uuid}/confirm', [EventOneController::class, 'confirmation'])->name('confirmation_event');

