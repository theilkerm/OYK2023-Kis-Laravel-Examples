@extends('layouts.app')

@section('content')
    <h2>All Course</h2>
    <table>
        <thead>
            <tr>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Course Name</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Course Lecturers</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Available Seats</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Edit</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->title }}</td>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->lecturers }}</td>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->available_seats }}
                    </td>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">
                        <h5>
                            <a href="{{ route('courses.edit', $course) }} ">Edit</a>

                        </h5>
                    </td>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">
                        <h5>
                            {{-- kurs detay rotası rota adı ve değişken ile çağrılır --}}
                            <a href="{{ route('courses.detail', $course->id) }}">Detail</a>
                        </h5>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
