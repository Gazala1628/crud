<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('users.update', $user->id) }}" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                <div class="invalid-feedback">
                    Please provide a name.
                </div>
            </div>
            <div class="form-group">
                <label for="address">city:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" required>
                <div class="invalid-feedback">
                    Please provide an address.
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                <div class="invalid-feedback">
                    Please provide a phone number.
                </div>
                <div class="form-group">
                <label for="phone">email:</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
