<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-text {
            color: #333;
            margin-bottom: 5px; /* Adjust as needed */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>User Profile</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $users->name }}</h5>
                <p class="card-text">Address: {{ $users->e_id}}</p>
                <p class="card-text">Phone: {{ $users->phone }}</p>
                <p class="card-text">Email: {{ $users->email }}</p>
                 
            </div>
        </div>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-block mt-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
         
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
