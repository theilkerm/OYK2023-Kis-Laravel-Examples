@extends('layouts.app')

@section('content')
    <h2>{{ $student->name }} Details</h2>
    <a href=" {{ route('students.edit', $student->id) }}">Edit student</a>
    <a href="{{ route('students.delete', $student->id) }}"></a>
    <table>
        <thead>
            <tr>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Student Name</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Course</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Age</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Created At</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Updated At</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Critical Operation</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $student->name }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $course->title }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $student->age }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $student->created_at }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $student->updated_at }}</td>
                <td style="text-align: center; border: 1px solid black; padding: 5px ">
                    {{-- kurs silme butonu DELETE methodu ile olduğu için form olarak gönderilir --}}
                    <form method="POST" action="{{ route('students.delete', $student->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
@endsection
