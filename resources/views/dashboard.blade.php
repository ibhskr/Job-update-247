<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>DashBoard</h1>
    <p>{{ Auth::user() }}</p>
    <hr>
    <p>{{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p>
    <a href="{{ route("logout") }}"><button>LogOut</button></a>
</body>

</html>