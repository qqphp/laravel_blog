<?php

use Ichynul\Configx\Http\Controllers\ConfigxController;

Route::get('configx/edit/{id?}', ConfigxController::class.'@edit');
Route::post('configx/saveall/{id?}', ConfigxController::class.'@saveall');
Route::put('configx/sort', ConfigxController::class.'@postSort');