<!DOCTYPE html>
<html>

<head>
    <title>New Course</title>
</head>

<body>
    <h1>New Course</h1>
    <form action="{{ route('courses.create')}}" method="POST">
        @csrf
        <label for="title">Course Name</label>
        <input style="width: 200px; margin-bottom:10px" id="title" name="title" type="text">
        <br>
        <label for="lecturers">Course Lecturers</label>
        <input style="width: 200px; margin-bottom:10px" id="lecturers" name="lecturers" type="text">
        <br>
        <label for="available_seats">Available Seats</label>
        <input style="width: 200px; margin-bottom:10px" id="available_seats" name="available_seats" type="number">
        <br>
        <input type="submit" value="Submit">

    </form>
</body>
