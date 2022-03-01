<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    Route::post('temporary-media', [\Tecbay\Laramedia\Controllers\TemporaryMediaController::class, 'store']);
});
