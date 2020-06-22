<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('threads.index');
})->name('index');

Route::get('/threads/{id}', 'ThreadsController@show')->name('threads.show');

Route::middleware(['auth'])->group(function () {

    Route::name('threads.')->prefix('threads')->group(function () {
        Route::get('/', 'ThreadsController@index')->name('index');
        Route::post('/', 'ThreadsController@store')->name('store');
        Route::put('/{id}', 'ThreadsController@update')->name('update');
        Route::get('/{id}/edit', 'ThreadsController@edit')->name('edit');
    });

    Route::name('replies.')->prefix('replies')->group(function () {
        Route::get('/{id}', 'RepliesController@show')->name('show');
    });
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
})->name('home');
