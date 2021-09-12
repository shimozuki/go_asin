@extends('layouts.backend.app')
@section('title','Detail Data Kosan')
@section('content')
<div class="content-body">
  <div id="user-profile">
    <div class="row">
      <div class="col-12">
        <div class="profile-header mb-2">
          <div class="relative">
            <div class="cover-container">
                <img class="img-fluid bg-cover rounded-0 w-100" src="{{asset('bg_foto/' .$show->bg_foto)}}" style="min-height: 400px; max-height:400px">
            </div>
            <div class="profile-img-container d-flex align-items-center justify-content-between">
                <img src="{{asset('assets/images/profile/profile.jpg')}}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                <div class="float-right">
                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1">
                      <a href=""> <i class="feather icon-edit-2"></i></a>
                    </button>
                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary">
                      <a href=""> <i class="feather icon-arrow-left"></i></a>
                    </button>
                </div>
            </div>
          </div>
          <div class="d-flex justify-content-end align-items-center profile-header-nav">
            <nav class="navbar navbar-expand-sm w-100 pr-0">
                <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <span class="justify-content-start" style="margin-left:20%">
                    {{$show->nama_kamar}}
                  </span>
                </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <section id="profile-info">

    </section>
  </div>
</div>
@endsection