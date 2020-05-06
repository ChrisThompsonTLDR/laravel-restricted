<?php

use Illuminate\Support\Facades\Route;
use Christhompsontldr\LaravelRestricted\Http\Controllers\RestrictedController;

Route::group(['prefix' => config('restricted.routes.prefix'),  'middleware' => config('restricted.routes.middleware'), 'as' => 'restricted.'], function () {
    Route::get('enter', [RestrictedController::class, 'enter'])->name('enter');

    Route::group(['middleware' => 'can:restricted'], function () {
        Route::view('/', 'restricted::index')->name('index');
        Route::view('exit', 'restricted::exit')->name('exit');

        Route::post('exit', [RestrictedController::class, 'exit'])->name('exitProcess');
    });
});
