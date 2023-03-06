<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$value = config('app.timezone');
date_default_timezone_set($value);

Route::get('/', function () {
    return view('welcome');
});

Route::get('robots.txt', function () {
    return config('site.robots');
});

Route::get('clear_cache', function () {
    Cache::forget('settings_data');
    Cache::forget('site_url_for_shell');

    return response()->json(['Success' => 'setting cache cleared'], 200);
});