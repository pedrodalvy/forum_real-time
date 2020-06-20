<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('threads.index');
});

Route::get('/threads/{id}', 'ThreadsController@show')->name('threads.show');


Route::middleware(['auth'])->group(function () {
    Route::get('threads', 'ThreadsController@index');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
})->name('home');
