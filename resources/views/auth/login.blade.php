<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <style>
    .border-md {
        border-width: 2px;
    }

    .btn-facebook {
        background: #405D9D;
        border: none;
    }

    .btn-facebook:hover, .btn-facebook:focus {
        background: #314879;
    }

    .btn-twitter {
        background: #42AEEC;
        border: none;
    }

    .btn-twitter:hover, .btn-twitter:focus {
        background: #1799e4;
    }

    body {
        min-height: 100vh;
    }

    .form-control:not(select) {
        padding: 1.5rem 0.5rem;
    }

    select.form-control {
        height: 52px;
        padding-left: 0.5rem;
    }

    .form-control::placeholder {
        color: #ccc;
        font-weight: bold;
        font-size: 0.9rem;
    }
    .form-control:focus {
        box-shadow: none;
    }

  </style>
</head>
<body>
  <!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <!-- Navbar Brand -->
            <a href="/" class="navbar-brand">
            <img src="{{url('assets/images/gambar/Go_Asin.png')}}" style="width: 40%;" alt="">
            </a>
        </div>
    </nav>
</header>


<div class="container">
  <div class="row py-5 mt-4 align-items-center">
    <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
      <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
      <h1>Login Account</h1>
      <p class="font-italic text-muted mb-0">Cari dan sewa tanah dengan mudah di Goasin.com</p>
    </div>

    <!-- Registeration Form -->
    <div class="col-md-7 col-lg-6 ml-auto">
      <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="row">

          <!-- Email Address -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                    <i class="fa fa-envelope text-muted"></i>
                </span>
            </div>
            <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Password -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-lock text-muted"></i>
              </span>
            </div>
            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md @error('password') is-invalid @enderror">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Submit Button -->
          <div class="form-group col-lg-12 mx-auto mb-0">
            <button type="submit" class="btn btn-primary btn-block py-2">
              <span class="font-weight-bold">Login your account</span>
            </button>
          </div>

          <!-- Not Already Registered -->
          <div class="text-center w-100">
            <p class="text-muted font-weight-bold">Not Already Registered? <a href="{{route('register')}}" class="text-primary ml-2">Register</a></p>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
</body>
<script>
  $(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
  });
</script>
</html>