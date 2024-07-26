<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

    <div class="container mt-5">
        <h3>Student Data Information</h3>
        
        {{-- message --}}
        <div>
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>

        <div class="mb-3">
            <a href="{{ route('student.studentcreate') }}" class="btn btn-primary">Create Student</a>
        </div>

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>EMAIL</th>
                    <th>BIRTHDATE</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->birthdate }}</td>
                    <td>
                        <a href="{{ route('student.edit', ['student' => $student]) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('student.delete', ['student' => $student]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>
