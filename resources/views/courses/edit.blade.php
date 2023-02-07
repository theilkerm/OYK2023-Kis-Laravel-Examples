@extends('layouts.app')

@section('content')
    <h2>{{ $course->title }} Edit</h2>
    <form action="{{ route('courses.update', $course->id) }} " method="POST">
        @csrf
        @method('PUT')

        <br>
        @error('title')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        <label for="title">Course Name</label>
        <input style="width: 200px; margin-bottom:10px" id="title" name="title"
            value="{{ old('title') ? old('title') : $course->title }}" type="text">
        <br>
        @error('lecturers')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        <label for="lecturers">Course Lecturers</label>
        <input style="width: 200px; margin-bottom:10px" id="lecturers" name="lecturers"
            value="{{ old('lecturers') ? old('lecturers') : $course->lecturers }}" type="text">
        <br>
        @error('available_seats')
            <div style="font-weight:bold; color:red; ">{{ $message }}</div>
        @enderror
        <label for="available_seats">Available Seats</label>
        <input style="width: 200px; margin-bottom:10px" id="available_seats" name="available_seats"
            value="{{ old('available_seats') ? old('available_seats') : $course->available_seats }}" type="text">
        <br>
        <input type="submit" value="Update">
    </form>
@endsection
