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

// route tanımlama
Route::get('/mustafa', function () {
    return "mustafa'ya hoş geldiniz";

});

// parametreli route
Route::get('selam/{isim}', function ($isim) {
    return "selam " . $isim;

});

// parametre kontrolüne göre farklı cevaplar verilir
Route::get('senKimsin/{name}', function ($name) {
    if ($name == "mustafa") {
        return "sen mustafasın";
    } else   {
        return "sen kimsin " . $name;
    }
});

// ? işareti ile parametre zorunlu değil
Route::get('selam2/{name?}', function ($name = "mustafa") {
    return "selam " . $name;
})->where('name', '[A-Za-z]+');