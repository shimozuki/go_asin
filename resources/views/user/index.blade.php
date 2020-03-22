@extends('layouts.backend')
@section('title','Dashboard Pengguna')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-gradient-green">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
            <div class="stats-content">
                <div class="stats-title">TODAY'S</div>
                <div class="stats-number">Coming Soon..</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 70.1%;"></div>
                </div>
                <div class="stats-desc">Lagi dipikirn mau diisi apa...</div>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-gradient-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
            <div class="stats-content">
                <div class="stats-title">TODAY'S</div>
                <div class="stats-number">Coming Soon..</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 40.5%;"></div>
                </div>
                <div class="stats-desc">Lagi dipikirn mau diisi apa...</div>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-gradient-purple">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
            <div class="stats-content">
                <div class="stats-title">TODAY'S</div>
                <div class="stats-number">Coming Soon..</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 76.3%;"></div>
                </div>
                <div class="stats-desc">Lagi dipikirn mau diisi apa...</div>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-gradient-black">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
            <div class="stats-content">
                <div class="stats-title">TODAY'S</div>
                <div class="stats-number">Coming Soon..</div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 54.9%;"></div>
                </div>
                <div class="stats-desc">Lagi dipikirn mau diisi apa...</div>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
</div>

<div class="row">
    <div class="col-lg-4">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="index-2">
            <div class="panel-heading">
                <h4 class="panel-title">Chat Dengan Pemilik Kost <span class="label bg-gradient-green pull-right">2 Pesan</span></h4>
            </div>
            <div class="panel-body bg-silver">
                <div class="chats" data-scrollbar="true" data-height="225px">
                    <div class="left">
                        <span class="date-time">yesterday 11:23pm</span>
                        <a href="javascript:;" class="name">Pemilik Kost</a>
                        <a href="javascript:;" class="image"><img alt="" src="{{asset('backend/img/user/user-12.jpg')}}" /></a>
                        <div class="message">
                           Fitur Chat akan hadir, tungguin aja ya...
                        </div>
                    </div>
                    <div class="right">
                        <span class="date-time">08:12am</span>
                        <a href="javascript:;" class="name"><span class="label label-primary">USER</span> Me</a>
                        <a href="javascript:;" class="image"><img alt="" src="{{asset('backend/img/user/user-13.jpg')}}" /></a>
                        <div class="message">
                            Baik,.....
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="panel-footer">
                <form name="send_message_form" data-id="message-form">
                    <div class="input-group">
                        <input type="text" class="form-control" name="message" placeholder="Enter your message here.">
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="button"><i class="fab fa-lg fa-fw m-r-10 fa-telegram-plane"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>

    <div class="col-lg-8">
        <div class="panel panel-inverse" data-sortable-id="index-8">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Fitur Yang Bakal Hadir..</h4>
            </div>
            <div class="panel-body p-0">
                <ul class="todolist">
                    <li>
                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square"></i></div>
                            <div class="todolist-title">Chatting antara pengguna dan pemilik kos</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square"></i></div>
                            <div class="todolist-title">Direct Payment yang lebih simple</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square"></i></div>
                            <div class="todolist-title">Booking kamar</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square"></i></div>
                            <div class="todolist-title">Pencarian kosan berdasarkan tempat/wilayah/nama kosan</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square"></i></div>
                            <div class="todolist-title">Testimoni dari pencari dan pemilik kosan</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container active" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square"></i></div>
                            <div class="todolist-title">Upload foto kamar dari pemilik kosan</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container active" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square"></i></div>
                            <div class="todolist-title">Penilaian/rating dari pencari kosan</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container active" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square"></i></div>
                            <div class="todolist-title">Perpanjang kosan dengan sekali klik</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection