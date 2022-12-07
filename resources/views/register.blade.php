<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athena Threat Center - Sign Up</title>
    <link rel="stylesheet" type="text/css" href="/css/signup-page.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gugi&display=swap" rel="stylesheet">
</head>


<body>

    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Athena</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <a class="nav-link" href="/">Home</a>
                    <a class="nav-link" href="/about">About</a>
                    <a class="nav-link" href="/showblog">Blog</a>
                    <a class="nav-link" href="/forum">Forum</a>
                    <a class="nav-link" href="/login">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->



<div class="signup-box">
    <h2>Athena Threat Center</h2>
    <form action="/register" method="POST">
        @csrf
        <div class="user-box">
            <input type="text" name="name" id="name" placeholder="" required>
            @if($errors->has('name'))
                <div class="error" role="alert">
                    {{$errors->first('name')}}
                </div>
            @endif
            <label>Name</label>
        </div>
        <div class="user-box">
            <input type="text" name="username" id="username" placeholder="" required>
            @if($errors->has('username'))
                <div class="error" role="alert">
                    {{$errors->first('username')}}
                </div>
            @endif
            <label>Username</label>
        </div>
        <div class="user-box">
            <input type="email" name="email" id="email" placeholder="" required>
            @if($errors->has('email'))
                <div class="error" role="alert">
                    {{$errors->first('email')}}
                </div>
            @endif
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" placeholder="" required>
            @if($errors->has('password'))
                <div class="error" role="alert">
                    {{$errors->first('password')}}
                </div>
            @endif
            <label>Password</label>
        </div>
        <button type="submit" class="btn btn-primary signup">Sign Up</button>
    </form>
</div>
</body>