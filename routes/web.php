<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('threads.index');
})->name('index');

Route::get('/threads/{id}', 'ThreadsController@show')->name('threads.show');

Route::middleware(['auth'])->group(function () {
    Route::get('threads', 'ThreadsController@index')->name('threads.index');
    Route::post('threads', 'ThreadsController@store')->name('threads.store');
    Route::put('threads/{id}', 'ThreadsController@update')->name('threads.update');
    Route::get('threads/{id}/edit', 'ThreadsController@edit')->name('threads.edit');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
})->name('home');
