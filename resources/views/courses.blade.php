<!DOCTYPE html>
<html>
    <head>
        <title>My Courses</title>
    </head>
    <body>
        <h1>My Courses</h1>
        <a href="{{ route('courses.create.form')}}">Create New Course</a>
        <table>
            <thead>
                <tr>
                    <th style="text-align: center; border: 1px solid black; padding: 5px ">Course Name</th>
                    <th style="text-align: center; border: 1px solid black; padding: 5px ">Course Lecturers</th>
                    <th style="text-align: center; border: 1px solid black; padding: 5px ">Available Seats</th>
                    <th style="text-align: center; border: 1px solid black; padding: 5px ">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->title }}</td>
                        <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->lecturers }}</td>
                        <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->available_seats }} </td>
                        <td style="text-align: center; border: 1px solid black; padding: 5px ">
                            {{-- kurs güncelleme formuna gider methodu ile --}}
                            <a href="{{ route('courses.update.form', $course->id) }} ">Edit</a>
                            {{-- kurs detay rotası rota adı ve değişken ile çağrılır --}}
                            <a href="{{ route('courses.detail', $course->id) }}">Detail</a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>