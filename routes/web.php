<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('threads.index');
})->name('index');

Route::get('/threads/{id}', 'ThreadsController@show')->name('threads.show');


Route::middleware(['auth'])->group(function () {
    Route::get('threads', 'ThreadsController@index');
    Route::post('threads', 'ThreadsController@store');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
})->name('home');
