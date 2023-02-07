@extends('layouts.app')

@section('content')
    <h2>{{ $course->title }} Details</h2>
    <a href=" {{ route('courses.edit', $course->id) }}">Edit Course</a>
    <a href="{{ route('courses.delete', $course->id) }}"></a>
    <table>
        <thead>
            <tr>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Course Name</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Course Lecturers</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Available Seats</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Eklenme Zamanı</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Güncellenme Zamanı</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Critical Operation</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->title }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->lecturers }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->available_seats }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->created_at }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->updated_at }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">
                    {{-- kurs silme butonu DELETE methodu ile --}}
                    <form method="POST" action="{{ route('courses.delete', $course->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
