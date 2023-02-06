<!DOCTYPE html>
<html>
    <head>
        <title>{{ $course->title }} Edit</title>
    </head>
    <body>
        <h1>{{ $course->title }} Edit</h1>
        <form action="{{ route('courses.update', $course->id)}} " method="POST">
            @csrf
            @method('PUT')

            <br>
            <label for="title">Course Name</label>
            <input style="width: 200px; margin-bottom:10px" id="title" name="title" value="{{ $course->title }}" type="text">
            <br>
            <label for="lecturers">Course Lecturers</label>
            <input style="width: 200px; margin-bottom:10px" id="lecturers" name="lecturers" value="{{ $course->lecturers }}" type="text">
            <br>
            <label for="available_seats">Available Seats</label>
            <input style="width: 200px; margin-bottom:10px" id="available_seats" name="available_seats" value="{{ $course->available_seats }}" type="text">
            <br>
            <input type="submit" value="Submit">
        </form>
    </body>