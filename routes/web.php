<?php

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;


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
    // return "herhangi bir şey";
    return redirect()->route('courses.index');
});

// // route tanımlama
// Route::get('mustafa', function () {
//     return "mustafa'ya hoş geldiniz";

// });

// // parametreli route
// Route::get('selam/{isim}', function ($isim) {
//     return "selam " . $isim;

// });

// // parametre kontrolüne göre farklı cevaplar verilir
// Route::get('senKimsin/{name}', function ($name) {
//     if ($name == "mustafa") {
//         return "sen mustafasın";
//     } else   {
//         return "sen kimsin " . $name;
//     }
// });

// // ? işareti ile parametre zorunlu değil
// Route::get('selam2/{name?}', function ($name = "mustafa") {
//     return "selam " . $name;
// });

// tüm kursları getirir
Route::get('courses', [CourseController::class,'index'])->name('courses.index');

//ID'ye göre kurs getirir
Route::get('courses/{course}',[CourseController::class, 'show'] )->name('courses.detail') ;

// kurs silme
Route::delete('courses/delete/{course}', [CourseController::class, 'destroy'] )->name('courses.delete');

// kurs ekleme formuna gider
Route::get('courses/create/form', [CourseController::class, 'create'] )->name('courses.create.form');

// kursu kaydeder
Route::post('courses/create', [CourseController::class,'store'] )->name('courses.create');

//kurs update formuna gider
Route::get('courses/update/{course}', [CourseController::class, 'edit'])->name('courses.edit');

//kursu günceller
Route::put('courses/update/{course}', [CourseController::class, 'update'])->name('courses.update');