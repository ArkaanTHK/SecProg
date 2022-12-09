<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
    <title>@yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/blog.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gugi&display=swap" rel="stylesheet">
</head>
<body>
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
                          @auth
                          @if (Request::is('showblog'))
                            <a class="nav-link active" aria-current="page" href="/showblog">Blog</a>
                            @if (Auth::user()->isAdmin == 1)
                                <a class="nav-link" href="/adminblog">Adminblog</a>
                            @endif
                          @else
                            <a class="nav-link" href="/showblog">Blog</a>
                            @if (Auth::user()->isAdmin == 1)
                                <a class="nav-link active" href="/adminblog">Adminblog</a>
                            @endif
                          @endif
                          @endauth
                      </div>
                  </div>
              </div>
        </nav>
        <!-- End of Navbar -->
    
    
    <div class="container mt-4">
        @yield('header')
        <div class="row">
            @yield('main')
            @yield('sidebar')
        </div>
    </div>
</body>
</html>

