<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Student Data</title>
</head>

<body>

    <div class="container mt-5">
        <h3>Edit Student Data</h3>

        <form method="POST" action="{{ route('student.update', ['student' => $student]) }}">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $student->name }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $student->address }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $student->email }}">
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthdate" value="{{ $student->birthdate }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Student Data</button>
        </form>
    </div>

</body>
</html>
