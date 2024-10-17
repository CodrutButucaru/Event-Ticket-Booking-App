<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #3498db;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            color: white;
            border-bottom: 1px solid #fff;
        }

        nav {
            background-color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            margin: 0 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<header>
    Evenimente
</header>

<nav>
    <div class="navbar">


        <a href="{{ url('/cos') }}" class="navbar-item">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cos
            <span class="badge bg-danger">{{ count((array) session('cos')) }}</span>
        </a>
    </div>
</nav>

</body>
</html>
