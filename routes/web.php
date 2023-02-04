<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return "herhangi bir şey";
    return view('welcome');

});

Route::get('/deli', function () {
    return "deli'ye hoş geldiniz";

});

Route::get('selam/{isim}', function ($isim) {
    return "selam " . $isim;

});
