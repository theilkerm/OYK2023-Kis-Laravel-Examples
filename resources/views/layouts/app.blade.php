{{-- sayfa şablonu gibi düşünülebilir. içindeki @yield('content') ile içerisine yazılan kodlar yerleştirilir.
 @section('content') ile başlayıp @endsection ile bitirilir. 
 @extends('layouts.app') ile bu şablonun kullanılacağı belirtilir. 
 @section('content') ile başlayıp @endsection ile bitirilir.
  @extends('layouts.app') ile bu şablonun kullanılacağı belirtilir. --}}

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    {{-- temel css kodları --}}
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: aquamarine;
            color: #000;
        }

        .container{
            width: 80%;
            margin: 0 auto;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        a{
            text-decoration: underline;
            color: inherit;
        }

    </style>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <th>
                    <img src="https://media.tenor.com/QWai-afTJb4AAAAC/graphic-design-is-my-passion-designer.gif" height="50vh" alt="">
                </th>
                <th>
                    <h1>Course Management System</h1>
                </th>
            </thead>
        </table>
        {{-- her sayfada görüneceği için navbar eklenir --}}
        <nav>
            <ul>
                <li>
                    <a href="{{route('courses.index')}}">All Courses</a>
                </li>
                <li>
                    <a href="{{ route('students.index') }}">All Students</a>
                </li>
                <li>
                    <a href="{{ route('courses.create.form')}}">Create New Course</a>
                </li>
                <li>
                    <a href="{{ route('students.create.form') }} ">Add Student</a>
                </li>
            </ul>
        </nav>
        <hr>
        
        {{-- sayfa içeriğinin basılacağı yer --}}
        @yield('content')

        <hr>
        Alt
        
    </div>
</body>
</html>