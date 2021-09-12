<nav class="navbar navbar-expand-lg navbar-light ftco_navbar bg-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="/"><img src="{{url('assets/images/gambar/Go_Asin.png')}}" style="width: 40%;" alt="">
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
        <li class="nav-item dropdown" style="margin-top: -20%">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/login">Masuk</a></li>
            <li><a class="dropdown-item" href="/register">Daftar</a></li>
          </ul>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>