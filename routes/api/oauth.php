<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'throttle:60,1',
])->group(function () {
    // Health check
    Route::get('/health_check', static function () {
        return response()->json(['status' => 'ok']);
    });
});
