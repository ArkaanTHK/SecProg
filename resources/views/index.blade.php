<!doctype html>
<html lang="en" dir="ltl">


  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
    <title>Athena Threat Center</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css">

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
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                        <a class="nav-link" href="/about">About</a>
                        <a class="nav-link" href="/showblog">Blog</a>
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



      <!-- Jumbotron Card Bootstrap -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4 athena">Athena</h1>
          <p class="lead">Solution of All Solution</p>
        </div>
       <!-- Card -->

      <div class="container">
        <div class="row cards">


          @foreach ($articles as $article)
          @if($article->image != null)
          <div class="col-md-4 bintang">
            <div class="card">
              <img src="{{ asset('storage/' . $article->image)  }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $article->judul }}</h5>
                <p class="card-text">{{ $article->deskripsi }}</p>
              </div>
            </div>
          </div>

          @else
          <div class="col-md-4 bintang">
            <div class="card">
              <img src="https://pammana.wajokab.go.id/img/no-image.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $article->judul }}</h5>
                <p class="card-text">{{ $article->deskripsi }}</p>
              </div>
            </div>
          </div>
          @endif
          @endforeach





        </div>
      </div>


  </body>
</html>












          {{-- <div class="col-md-4">
            <div class="card">
              <img src="https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div> --}}
        
      
          


