<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Data Information</title>
</head>

<body>

    <div class="container mt-5">
        <h3>Student Data Information</h3>

        <!-- Displaying success message if available -->
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Displaying validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Button trigger modal for creating a new student -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createStudentModal">
            Create New Student
        </button>
        <!-- Modal for creating a new student -->
        <div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createStudentModalLabel">Create Student Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('student.store') }}">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthdate" required>
                            </div>

                        
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save New Student</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table displaying student data -->
        <table class="table table-bordered mt-5">
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
                            <!-- Button trigger modal for editing a student -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStudentModal-{{ $student->id }}">
                                Edit
                            </button>

                            <!-- Modal for editing a student -->
                            <div class="modal fade" id="editStudentModal-{{ $student->id }}" tabindex="-1" aria-labelledby="editStudentModalLabel-{{ $student->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editStudentModalLabel-{{ $student->id }}">Edit Student Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('student.update', ['student' => $student->id]) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $student->name }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $student->address }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $student->email }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="birthdate">Birthdate</label>
                                                    <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthdate" value="{{ $student->birthdate }}" required>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Update Student Data</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <!-- Button trigger modal for deleting a student -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteStudentModal-{{ $student->id }}">
                                Delete
                            </button>

                            <!-- Modal for deleting a student -->
                            <div class="modal fade" id="deleteStudentModal-{{ $student->id }}" tabindex="-1" aria-labelledby="deleteStudentModalLabel-{{ $student->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteStudentModalLabel-{{ $student->id }}">Confirm Deletion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this student?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('student.delete', ['student' => $student->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
