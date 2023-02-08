@extends('layouts.app')

@section('content')
    <h2>New Student</h2>
    <img src="https://media.tenor.com/S61VCO73mOAAAAAC/linux-tux.gif" width="20%" height="auto" alt="">
    <form action="{{ route('students.create')}}" method="POST">
        {{-- formların csrf tokenlarını doğrulaması için csrf tokenlarını ekliyoruz. --}}
        @csrf
        <label for="name">Student Name:</label>
        {{-- validasyon hatalarını göstermek için --}}
        @error('name')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        {{-- hata gösterme bloğu sonu --}}
        
        {{-- value içerisindeki old('name') ile formu tekrar açtığımızda eski değerleri tekrar yazdırıyoruz. eğer yoksa form boş döner --}}
        <input style="width: 200px; margin-bottom:10px" id="name" name="name" type="text" value="{{ old('name')}}" required>
        <br>
        <label for="course_id">Course:</label>
        @error('course_id')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        <select style="width: 200px; margin-bottom:10px" id="course_id" name="course_id" value="{{old('course_id')}}" required>
            <option value="">Select Course</option>
            @foreach ($courses as $course)
                <option value="{{$course->id}}">{{$course->title}}</option>
            @endforeach
        </select>
        <br>
        <label for="birth_date">Birth Date:</label>
        @error('birth_date')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        <input style="width: 200px; margin-bottom:10px" id="birth_date" name="birth_date" type="date" value="{{old('birth_date')}}" >
        <br>
        <input type="submit" value="Submit">

    </form>
@endsection