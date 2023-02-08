<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;


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

// tüm kursları getirir. CourseController'da index fonksiyonu ile
Route::get('courses', [CourseController::class,'index'])->name('courses.index');

//ID'ye göre kurs getirir. CourseController'da show fonksiyonu ile
Route::get('courses/{course}',[CourseController::class, 'show'] )->name('courses.detail') ;

// kurs silme. CourseController'da destroy fonksiyonu ile
Route::delete('courses/delete/{course}', [CourseController::class, 'destroy'] )->name('courses.delete');

// kurs ekleme formuna gider. CourseController'da create fonksiyonu ile
Route::get('courses/create/form', [CourseController::class, 'create'] )->name('courses.create.form');

// kursu kaydeder. CourseController'da store fonksiyonu ile
Route::post('courses/create', [CourseController::class,'store'] )->name('courses.create');

//kurs update formuna gider. CourseController'da edit fonksiyonu ile
Route::get('courses/update/{course}', [CourseController::class, 'edit'])->name('courses.edit');

//kursu günceller. CourseController'da update fonksiyonu ile
Route::put('courses/update/{course}', [CourseController::class, 'update'])->name('courses.update');

//STUDENT ROUTES

//tüm öğrencileri getirir. StudentController'da index fonksiyonu ile
Route::get('students', [StudentController::class, 'index'])->name('students.index');

//ID'ye göre öğrenci getirir. StudentController'da show fonksiyonu ile
Route::get('students/{student}', [StudentController::class, 'show'])->name('students.detail');

//öğrenci silme. StudentController'da destroy fonksiyonu ile
Route::delete('students/delete/{student}', [StudentController::class, 'destroy'])->name('students.delete');

//öğrenci ekleme formuna gider. StudentController'da create fonksiyonu ile
Route::get('students/create/form', [StudentController::class, 'create'])->name('students.create.form');

//öğrenci kaydeder. StudentController'da store fonksiyonu ile
Route::post('students/create', [StudentController::class, 'store'])->name('students.create');

//öğrenci update formuna gider. StudentController'da edit fonksiyonu ile
Route::get('students/update/{student}', [StudentController::class, 'edit'])->name('students.edit');

//öğrenci günceller. StudentController'da update fonksiyonu ile
Route::put('students/update/{student}', [StudentController::class, 'update'])->name('students.update');
