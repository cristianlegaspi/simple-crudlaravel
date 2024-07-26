<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Create Student Data</title>
</head>

<body>

    <div class="container mt-5">
        <h1>Create Student Data</h1>

        @if($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('student.store') }}">

            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthdate">
            </div>

            <button type="submit" class="btn btn-primary">Save New Student</button>
        </form>
    </div>
</body>
</html>
