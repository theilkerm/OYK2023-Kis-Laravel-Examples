@extends('layouts.app')

@section('content')
    <h2>All Students</h2>
    <table>
        <thead>
            <tr>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Student Name</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Course</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Age</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Edit</th>
                <th style="text-align: center; border: 1px solid black; padding: 5px ">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">{{ $student->name }}</td>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">
                        {{-- get student course title from course table --}}
                        @foreach ($courses as $course)
                        @if ($course->id == $student->course_id)
                            {{ $course->title }}
                        @endif
                        @endforeach
                        {{-- end  --}}
                    </td>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">
                        {{--yaş yazsın, yaş gelmiyorsa bilinmiyor yazsın --}}
                        {{ ($student->age) ? ($student->age) : ('Unknown') }}
                    </td>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">
                        <h5>
                            {{-- kurs düzenleme rotası rota adı ve değişken ile çağrılır --}}
                            <a href="{{ route('students.edit', $student) }} ">Edit</a>

                        </h5>
                    </td>
                    <td style="text-align: center; border: 1px solid black; padding: 5px ">
                        <h5>
                            {{-- kurs detay rotası rota adı ve değişken ile çağrılır --}}
                            <a href="{{ route('students.detail', $student->id) }}">Detail</a>
                        </h5>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
