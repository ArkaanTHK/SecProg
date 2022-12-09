<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athena Threat Center - Login</title>
    <link rel="stylesheet" type="text/css" href="css/login-page.css">
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
            <a class="navbar-brand" href="/">Athena</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                  <a class="nav-link" href="/">Home</a>
                  <a class="nav-link" href="/about">About</a>
                  <a class="nav-link" href="/showblog">Blog</a>
                  <a class="nav-link" href="/register">Signup</a>
              </div>
          </div>
      </div>
    </nav>
<!-- End of Navbar -->



<!-- Login Box -->
    @if(session()->has('alert'))
    <div class="container">
    <div class="alert alert-danger">
        {{ session()->get('alert') }}
    </div>
    </div>
    @endif
    @if(session()->has('success'))
    <div class="container">
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="container">
    <div class="alert alert-danger">
        {{ session()->get('loginError') }}
    </div>
    </div>
    @endif

    <div class="login-box">
    <h2>Athena Threat Center</h2>
    <form action="/login" method="post">
        @csrf
        <div class="user-box">
            <input type="text" name="username" id="username" required>
            <label>Username</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" id="password" required>
            <label>Password</label>
        </div>
        <div class="forget">
            <a href="/reset">Forgot Password?</a>
        </div>
        <button type="submit" class="btn btn-info">Login</button>
        </form>
            <div class="signup">
                <p>
                    New to Athena Threat Center?
                    <a href="/register">Create Account</a>
                </p>
            </div>
        </form>
    </div>


    <!-- End of Loginbox -->
</body>