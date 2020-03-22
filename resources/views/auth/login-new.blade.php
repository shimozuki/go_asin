@extends('layouts.auth')
@section('title','Silahkan Masuk')
@section('auth')
<div class="login login-v2" data-pageload-addclass="animated fadeIn">
    <!-- begin brand -->
    <div class="login-header">
        <div class="brand">
            <a href="{{url('/')}}" style="text-decoration:none"><span class="logo"></span> <b>Papi Kost</b></a>
            <small>Cari Kost dan Apartement Makin Mudah</small>
        </div>
        <div class="icon">
            <i class="fa fa-lock"></i>
        </div>
    </div>
    <!-- end brand -->
    <!-- begin login-content -->
    <div class="login-content">
        <form action="{{route('login')}}" method="post" class="margin-bottom-0">
            @csrf
            <div class="form-group m-b-20">
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address" required />
            </div>
            <div class="form-group m-b-20">
                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
            </div>
            <div class="login-buttons">
                <button type="submit" class="btn btn-success btn-block btn-lg">Masuk</button>
            </div>
            <div class="m-t-20">
                Belum Punya Akun? Click <a href="{{route('register')}}">Disini</a> Untuk Mendaftar.
            </div>
        </form>
    </div>
    <!-- end login-content -->
</div>
@endsection