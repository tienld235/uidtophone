<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'VnphoneController@showAll');
Route::post('/', 'VnphoneController@searchByUid');
