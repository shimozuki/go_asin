<nav class="navbar navbar-expand-lg navbar-light ftco_navbar bg-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="/"><span class="flaticon-pawprint-1 mr-2"></span>Pap!Kos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        @auth
          <li class="nav-item">
            <a href="/home">Halo, {{Auth::user()->name}} </a>
          </li>
        @else
          <li class="nav-item"><a href="/login" class="nav-link">Masuk</a></li>
          <li class="nav-item"><a href="/register" class="nav-link">Daftar</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>