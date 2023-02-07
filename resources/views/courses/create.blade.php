@extends('layouts.app')

@section('content')
    <h2>New Course</h2>
    <img src="https://media.tenor.com/3Q3PUB0AgmcAAAAd/vettel-donut.gif" width="20%" height="auto" alt="">
    <form action="{{ route('courses.create')}}" method="POST">
        @csrf
        <label for="title">Course Name</label>
        {{-- validasyon hatalarını göstermek için --}}
        @error('title')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        {{-- value içerisindeki old('title') ile formu tekrar açtığımızda eski değerleri tekrar yazdırıyoruz. --}}
        <input style="width: 200px; margin-bottom:10px" id="title" name="title" type="text" value="{{ old('title')}}" required>
        <br>
        <label for="lecturers">Course Lecturers</label>
        @error('lecturers')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        <input style="width: 200px; margin-bottom:10px" id="lecturers" name="lecturers" type="text" value="{{old('lecturers')}}">
        <br>
        <label for="available_seats">Available Seats</label>
        @error('available_seats')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        <input style="width: 200px; margin-bottom:10px" id="available_seats" name="available_seats" type="number" value="{{old('available seats')}}" required>
        <br>
        <input type="submit" value="Submit">

    </form>
@endsection