<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
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
                <h3>Pap!Kos</h3>
            </a>
        </div>
    </nav>
</header>


<div class="container">
  <div class="row py-5 mt-4 align-items-center">
    <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
      <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
      <h1>Create Account</h1>
      <p class="font-italic text-muted mb-0">Cari Kost dan Apartement Makin Mudah di Pap!Kos</p>
    </div>

    <!-- Registeration Form -->
    <div class="col-md-7 col-lg-6 ml-auto">
      <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="row">
          <!-- First Name -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                    <i class="fa fa-user text-muted"></i>
                </span>
            </div>
            <input id="name" type="text" name="name" placeholder="Name" class="form-control bg-white border-left-0 border-md @error('name') is-invalid @enderror" autocomplete="off" value="{{ old('name') }}">
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

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

          <!-- Role -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-black-tie text-muted"></i>
              </span>
            </div>
            <select id="role" name="role" class="form-control custom-select bg-white border-left-0 border-md @error('role') is-invalid @enderror">
              <option>Mendaftar Sebagai</option>
              <option value="Pemilik">Pemilik Kost</option>
              <option value="Pencari">Pencari Kost</option>
            </select>
            @error('role')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Password -->
          <div class="input-group col-lg-6 mb-4">
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

          <!-- Password Confirmation -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-lock text-muted"></i>
              </span>
            </div>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Submit Button -->
          <div class="form-group col-lg-12 mx-auto mb-0">
            <button type="submit" class="btn btn-primary btn-block py-2">
              <span class="font-weight-bold">Create your account</span>
            </button>
          </div>

          <!-- Already Registered -->
          <div class="text-center w-100">
            <p class="text-muted font-weight-bold">Already Registered? <a href="{{route('login')}}" class="text-primary ml-2">Login</a></p>
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