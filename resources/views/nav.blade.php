<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD in Laravel</title>
    @include('boot')
    <style>
        .nav {
            font-size: 22px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
          <ul class="nav navbar-nav">
            <li><a href="#">Insert</a></li>
            <li><a href="{{ route('api.users') }}">View</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>

          </ul>
        </div>
    </nav>
</body>
</html>

