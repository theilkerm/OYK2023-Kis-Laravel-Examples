<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *  tüm kursları getirir. blade sayfasına basarak yönlendirir. 
     *  parametre istemez.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.courses', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *  kurs ekleme formuna gider. parametre istemez.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     * formdan gelen verileri kaydeder. parametre olarak formdan gelen verileri alır.
     *  formdan gelen verileri kontrol eder. doğruysa kaydeder. yanlışsa hata mesajı verir.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form içeriği kontrolü
        $request->validate([
            //zorunlu string, azami 255 karakter
            'title' => 'required|string|max:255',
            //zorunlu değil, string, azami 255 karakter
            'lecturers' => 'nullable|string|max:255',
            //zorunlu, integer, 0'dan büyük
            'available_seats' => 'required|integer|min:0',
        ]);
        //kayıt işlemi
        $course = new Course();
        $course->title = request('title');
        $course->lecturers = request('lecturers');
        $course->available_seats = request('available_seats');
        $course->save();
        return redirect()->route('courses.detail', $course->id);
    }

    /**
     * Display the specified resource.
     *  ID'ye göre kurs getirir. parametre olarak ID'yi alır.
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {   
        return view('courses.detail', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *  ID'ye göre kurs düzenleme formunu getirir. parametre olarak ID'yi alır.
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        return view('courses.edit', compact('course'));

    }

    /**
     * Update the specified resource in storage.
     *  ID'ye göre kursu günceller. parametre olarak ID'yi ve formdan gelen verileri alır.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            //zorunlu string, azami 255 karakter
            'title' => 'required|string|max:255',
            //zorunlu değil, string, azami 255 karakter
            'lecturers' => 'nullable|string|max:255',
            //zorunlu, integer, 0'dan büyük
            'available_seats' => 'required|integer|min:0',
        ]);

        //
        $course->title = $request->title;
        $course->lecturers = $request->lecturers;
        $course->available_seats = $request->available_seats;
        $course->save();
        return redirect()->route('courses.detail', $course->id);
    
    }

    /**
     * Remove the specified resource from storage.
     *  ID'ye göre kursu siler. parametre olarak ID'yi alır.
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();
        //route el ile girilir
        return redirect()->route('courses.index');
    
    }
}