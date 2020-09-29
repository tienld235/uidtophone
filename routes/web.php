<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'VnphoneController@index');
Route::post('/', 'VnphoneController@handleSubmit');