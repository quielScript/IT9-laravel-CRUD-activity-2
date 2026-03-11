<?php

use App\Http\Controllers\BookLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('logs.index');
});

Route::resource('logs', BookLogController::class);