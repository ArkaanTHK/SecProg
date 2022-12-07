<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
    <title>Athena Threat Center</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/about.css">

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
                    <a class="nav-link active" aria-current="page" href="/about">About</a>
                    <a class="nav-link" href="/showblog">Blog</a>
                    @auth
                    @if (Auth::user()->isAdmin == 1)
                    <a class="nav-link" href="/adminblog">Adminblog</a>
                    @endif
                    @endauth
                    <a class="nav-link" href="/forum">Forum</a>
                    @auth
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Welcome, {{ Auth::user()->username }}
                      </a>
                      <li class="nav-item dropdown">
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <form action="/logout" method="post">
                            @csrf
                            <li><button type="submit" class="dropdown-item">Logout</button></li>
                        </form>
                      </ul>
                      </li>
                      @else
                      <a class="nav-link" href="/login">Login</a>
                      @endauth
                </div>
            </div>
        </div>
  </nav>

    <!-- Main Content -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4 athena">About Athena</h1>
        </div>
    </div>


    <!-- Make About Us Content -->
    <div class="container">
        <div class="row">
            <hr class="rounded"></hr>
            <div class="col-md-6">
                <p>We are a team of cyber security enthusiast where we have interest to learn any topic related to cyber security. We have a mission to make the average user became more aware about the importance of cyber security awareness. </p>
                <p>We help, created, motivated everyone who are not an expert in Cyber Security to let them know and help them in every problem that they had , with our feature and system we can help them. We also have many cyber security expert to validate our web.</p>
                <p>With Athena, you could discuss and help everyone with our forum feature so that everybody can have a good time learning new things about Cyber Security, and possibly be a new expert in it. </p>
                <p>Our forum feature doesn't only discuss about Cyber Security, but anything can be discussed around the technology world like Programming Language's or related to Smartphone's, Computer's and many more. </p>
            </div>
            <hr class="rounded-2"></hr>
        </div>
    </div>

    

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <span class="text-muted">&copy; Athena Threat Center</span>
        </div>
    </footer>
</body>