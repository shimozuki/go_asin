@extends('layouts.backend')
@section('title','Profil Akun Pengguna')
@section('content')
<!-- Page-body start -->
<div class="page-body">
    <!--profile cover start-->
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="cover-profile">
                <div class="profile-bg-img">
                    <img class="profile-bg-img img-fluid" src="..\files\assets\images\user-profile\bg-img1.jpg" alt="bg-img">
                    <div class="card-block user-info">
                        <div class="col-md-12">
                            <div class="media-left">
                                <a href="#" class="profile-image">
                                    <img class="user-img img-radius" src="..\files\assets\images\user-profile\user-img.jpg" alt="user-img">
                                </a>
                            </div>
                            <div class="media-body row">
                                <div class="col-lg-12">
                                    <div class="user-title">
                                        <h2>{{auth::user()->name}}</h2>
                                        <span class="text-white">Web designer</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="pull-right cover-btn">
                                        <button type="button" class="btn btn-primary m-r-10 m-b-5"><i class="icofont icofont-plus"></i> Follow</button>
                                        <button type="button" class="btn btn-primary"><i class="icofont icofont-ui-messaging"></i> Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--profile cover end-->
    <div class="row">
        <div class="col-lg-12">
            <!-- tab header start -->
            <div class="tab-header card col-lg-12">
                <ul class="nav nav-tabs md-tabs tab-timeline col-lx-12" role="tablist" id="mytab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kost" role="tab">Kost Saya</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#disimpan" role="tab">Disimpan</a>
                        <div class="slide"></div>
                    </li>
                </ul>
            </div>
            <!-- tab header end -->
            <!-- tab content start -->
            <div class="tab-content">
                <!-- tab panel personal start -->
                @include('user.personal_info')
                <!-- tab pane personal end -->
                <!-- tab pane info start -->
                @include('user.disimpan')
                <!-- tab pane info end -->
                <!-- tab pane contact start -->
                @include('user.kost')
                <!-- tab pane contact end -->
            </div>
            <!-- tab content end -->
        </div>
    </div>
</div>
<!-- Page-body end -->
@endsection
