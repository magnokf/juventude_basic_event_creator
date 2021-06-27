<?php

use App\Http\Controllers\EventOneController;
use App\Http\Controllers\HomeController;
use App\Models\EventOne;
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

Auth::routes([
    'verify' => true,
    'register'=>false
]);

Route::get('/', function () {
    $total_enrollments = EventOne::all()
        ->count();
    $total_confirmed_enrollments = EventOne::all()
        ->where('email_verified_at','!=',null )
        ->count();
    $total_not_confirmed_enrollments = EventOne::all()
        ->where('email_verified_at','=',null )
        ->count();

    return view('welcome', [
        'total_enrollments' => $total_enrollments,
        'total_confirmed_enrollments'=>$total_confirmed_enrollments,
        'total_not_confirmed_enrollments'=>$total_not_confirmed_enrollments,
    ]);

})->name('principal');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/eventone', [EventOneController::class, 'create'])->name('inscricao');
Route::get('/not_confirmed', [EventOneController::class, 'not_confirmed'])->name('not_confirmed')->middleware('auth');

Route::resource('event_one', EventOneController::class)->middleware('auth');
Route::get('/confirmation-event/{uuid}/confirm', [EventOneController::class, 'confirmation'])->name('confirmation_event');


