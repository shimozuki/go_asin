@extends('layouts.backend')
@section('title','Kamar Saya')
@section('title_page','Data Kamar')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header text-center">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#room-active">Kamar Aktif</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#loading-payment">Menunggu Pembayaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#history">History</a>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <div class="tab-content p-0 m-0">
                        {{-- Kamar Aktif --}}
                            <div class="tab-pane fade active show" id="room-active">
                                @if (@$room->status == "Lunas")
                                    <div class="row mb-5">
                                        <div class="col-lg-6 col-xl-6 col-6">
                                            <h4 class="card-title" style="color:black">{{$room->nama_kamar}}</h4>
                                            <p class="card-text">Deskripsi Disini</p>
                                            
                                        </div> 
                                        <div class="col-lg-6 col-xl-6 col-6">
                                            <h5 class="card-title">
                                                Masuk : {{\carbon\carbon::parse($room->start)->format('d-m-y')}} <br>
                                                Berakhir : {{\carbon\carbon::parse($room->end)->format('d-m-y')}}
                                            </h5>
                                        </div>
                                    </div> 
                                        
                                    @if ($date == 0)
                                        <a href="javascript:;" class="btn btn-sm btn-danger btn-block">Berakhir</a>
                                    @elseif($date == 3 || $date == 2 || $date == 1)
                                    <a href="javascript:;" class="btn btn-sm btn-warning btn-block">Akan Berakhir</a>
                                    @else
                                        <p style="color:red">Kamar Kamu tersisa {{$date}} Hari Lagi </p>
                                    @endif
                                @elseif(@$room->status == "Menunggu Pembayaran")
                                    <h4 class="text-center">Tidak Ada Kamar Yang Aktif</h4>
                                @else
                                    <div class="card-title text-center">
                                        <h4>Tidak Ada Kamar Yang Aktif</h4>
                                        <a href="{{url('/')}}" class="btn btn-primary btn-sm mt-3">Pesan Kamar</a>
                                    </div>
                                @endif
                            </div>
                        {{-- End --}}
                        {{-- Menunggu Pembayaran --}}
                            <div class="tab-pane fade text-center" id="loading-payment">
                                @if (@$room->status == "Menunggu Pembayaran")
                                    <h4 class="card-title">Menunggu Pembayaran</h4>
                                    <p class="card-text">Deskripsi</p>
                                    <a href="{{url('payment-create', $room->id)}}" class="btn btn-sm btn-yellow">Bayar</a>
                                @elseif(@$room->status == "Proses")
                                    <h4 class="card-title">Pembayaran Sedang Diproses ...</h4>
                                @else
                                    <h4>Tidak Ada Pembayaran Menunggu</h4>
                                    <a href="{{url('/')}}" class="btn btn-primary btn-sm mt-3">Pesan Kamar</a>
                                @endif
                            </div>
                        {{-- End --}}
                        {{-- History --}}
                            <div class="tab-pane fade text-center" id="history">
                                <h4 class="card-title">Coming Soon....</h4>
                            </div>
                        {{-- End --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-inverse">
                <img class="card-img-top img-fluid" src="{{asset('backend/img/gallery/gallery-10.jpg')}}" alt="Card image cap" />
                <div class="card-img-overlay">
                    <h4 class="card-title">Halo,,,</h4>
                    <p class="card-text">{{auth::user()->name}}</p>
                    <p class="card-text"><small>Coming soon...</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection