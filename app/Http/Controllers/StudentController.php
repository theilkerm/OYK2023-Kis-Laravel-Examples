<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *  tüm öğrencileri getirir. blade sayfasına basarak yönlendirir.
     * parametre istemez.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('students.index', compact('students' , 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *  öğrenci ekleme formuna gider. parametre istemez.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses') );
    }

    /**
     * Store a newly created resource in storage.
     *  formdan gelen verileri kaydeder. parametre olarak formdan gelen verileri alır.
     * formdan gelen verileri kontrol eder. doğruysa kaydeder. yanlışsa hata mesajı verir.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form içeriği kontrolü
        $request->validate([
            //zorunlu string, azami 255 karakter
            'name' => 'required|string|max:255',
            //zorunlu, sadece mevcut olan course_id'ler arasından olabilir.
            'course_id' => 'required|exists:courses,id',
            //zorunlu değil, date, bugünden eski
            'birth_date' => 'nullable|date|before:today',
        ]);

        //kayıt işlemi
        $student = new Student();
        $student->name = request('name');
        $student->course_id = request('course_id');
        $student->birth_date = request('birth_date');
        $student->save();
        return redirect()->route('students.detail', $student->id);
    }

    /**
     * Display the specified resource.
     *  öğrenci detaylarını getirir. parametre olarak öğrenci id'sini alır.
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $course = Course::find($student->course_id);
        return view('students.detail', compact('student', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     *  öğrenci düzenleme formuna gider. parametre olarak öğrenci id'sini alır.
     *  öğrenci bilgilerini formda gösterir.
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses', 'date'));
    }

    /**
     * Update the specified resource in storage.
     *  formdan gelen verileri günceller. parametre olarak öğrenci id'sini ve formdan gelen verileri alır.
     * formdan gelen verileri kontrol eder. doğruysa günceller. yanlışsa hata mesajı verir.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //form içeriği kontrolü
        $request->validate([
            //zorunlu string, azami 255 karakter
            'name' => 'required|string|max:255',
            //zorunlu değil, string, azami 255 karakter
            'course_id' => 'required|integer|min:0',
            //zorunlu değil, date, bugünden eski
            'birth_date' => 'nullable|date|before:today',
        ]);

        //kayıt işlemi
        $student->name = request('name');
        $student->course_id = request('course_id');
        $student->birth_date = request('birth_date');
        $student->save();
        return redirect()->route('students.detail', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     *  öğrenciyi siler. parametre olarak öğrenci id'sini alır.
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
