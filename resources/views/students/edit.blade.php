@extends('layouts.app')

@section('content')
    <h2>Edit Student - {{ $student->name }}  </h2>
    {{-- <img src="https://media.tenor.com/3Q3PUB0AgmcAAAAd/vettel-donut.gif" width="20%" height="auto" alt=""> --}}
    <form action="{{ route('students.create')}}" method="POST">
        @csrf
        <label for="name">Student Name:</label>
        {{-- validasyon hatalarını göstermek için --}}
        @error('name')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        {{-- value içerisindeki old('name') ile formu tekrar açtığımızda eski değerleri tekrar yazdırıyoruz. --}}
        <input style="width: 200px; margin-bottom:10px" id="name" name="name" type="text" value="{{ old('name') ? old('name') : $student->name }}" required>
        <br>
        <label for="course_id">Course:</label>
        @error('course_id')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        <select style="width: 200px; margin-bottom:10px" id="course_id" name="course_id" value="{{old('course_id') ? old('course_id') : $student->course_id}}">
            <option value="">Select Course</option>
            {{-- mevcut kursları listeliyoruz. --}}
            @foreach ($courses as $course)
                {{-- option içerisinde selected yazan inline if öğrencinin eski kursunun seçili olarak gelmesini sağlıyor. --}}
                <option value="{{$course->id}}" {{($course->id == $student->course_id) ? "selected" : ""}} >{{$course->title}}</option>
            @endforeach
        </select>
        <br>
        <label for="birth_date">Birth Date:</label>
        @error('birth_date')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        {{-- format('Y-m-d') ile tarihi formatlıyoruz. dateTime formatı input tarafından bazı tarayıcılarda dolu işaretlenemiyor. --}}
        <input style="width: 200px; margin-bottom:10px" id="birth_date" name="birth_date" type="date" value="{{ $student->birth_date->format('Y-m-d')}}" required>
        <br>
        <input type="submit" value="Submit">
    
    </form>
@endsection