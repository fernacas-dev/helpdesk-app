<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('tickets', function() {
        return view('tickets.index');
    })
    ->name('tickets');

    Route::get('kanban', function() {
        return view('kanban.index');
    })
    ->name('kanban');

    Route::get('calendar', function() {
        return view('calendar.index');
    })
    ->name('calendar');

    Route::get('chat', [HomeController::class, 'index'])
        ->name('chat');

    Route::get('messages', [HomeController::class, 'messages'])
        ->name('messages');
    Route::post('message', [HomeController::class, 'message'])
        ->name('message');

    Route::get('base', function(  ) {
        return view('voyager::base');
    });
});
