<?php

use App\Models\Course;
use Illuminate\Http\Request;
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
    // return "herhangi bir şey";
    return view('welcome');

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
Route::get('courses', function () {
    //get all courses
   $courses = Course::all();
   return view('courses', compact('courses'));
})->name('courses.index');

//ID'ye göre kurs getirir
Route::get('courses/{courseId}', function ($courseId) {
    $course = Course::findOrFail($courseId);
    return view('courseDetail', compact('course'));
})->name('courses.detail') ;

// kurs silme
Route::delete('courses/delete/{courseId}', function ($courseId) {
    $course = Course::findOrFail($courseId);
    $course->delete();
    //route el ile girilir
    return redirect('/courses');
    // rotaya isim verilir ve isimle çağırılır, rota çağırılırken id parametresi verilir.
})->name('courses.delete');

// kurs ekleme
Route::get('courses/create/form', function () {
    return view('courseCreateForm');
})->name('courses.create.form');

Route::post('/courses/create', function () {
    $course = new Course();
    $course->title = request('title');
    $course->lecturers = request('lecturers');
    $course->available_seats = request('available_seats');
    $course->save();
    // route rota isminden çağırılarak kullanılır
    return redirect()->route('courses.detail', ['courseId' => $course->id]);
})->name('courses.create');

//kurs update formuna gider
Route::get('courses/update/{id}', function ($id) {
    $course = Course::findOrFail($id);
    return view('courseUpdateForm', compact('course'));
})->name('courses.update.form');

//kursu günceller
Route::put('/courses/update/{id}', function ($id, Request $request) {
    $course = Course::findOrFail($id);

    $course->title = $request->title;
    $course->lecturers = $request->lecturers;
    $course->available_seats = $request->available_seats;
    $course->save();
    return redirect()->route('courses.detail', $course->id);
})->name('courses.update');