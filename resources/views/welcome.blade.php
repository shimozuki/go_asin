@extends('layouts.home')
@section('title','Selamat Datang')
@section('content')
    <!-- Swiper slider card start -->
    <div class="card">
        <div class="card-header">
            <h5>Informasi</h5>
        </div>
        <div class="card-block">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="img-fluid width-100" src="..\files\assets\images\task\task-u2.jpg" alt="Card image cap">
                        <!-- end of card-block -->
                        <!-- end of card -->
                    </div>
                    <!-- end of swiper-slide -->
                    <div class="swiper-slide">
                        <img class="img-fluid width-100" src="..\files\assets\images\task\task-u3.jpg" alt="Card image cap">
                        <!-- end of card-block -->
                        <!-- end of card -->
                    </div>
                    <!-- end of swiper-slide -->
                    <div class="swiper-slide">
                        <img class="img-fluid width-100" src="..\files\assets\images\task\task-u4.jpg" alt="Card image cap">
                        <!-- end of card-block -->
                        <!-- end of card -->
                    </div>
                    <!-- end of swiper-slide -->
                    <div class="swiper-slide">
                        <img class="img-fluid width-100" src="..\files\assets\images\task\task-u1.jpg" alt="Card image cap">
                        <!-- end of card-block -->
                        <!-- end of card -->
                    </div>
                    <!-- end of swiper-slide -->
                </div>
                <!-- end of swipper-wrapper -->
            </div>
        </div>
    </div>
    <!-- Swiper slider card end -->

    {{-- Start Card Kos --}}
    <div class="row users-card">
        @foreach ($kos as $item)
        <div class="col-lg-6 col-xl-3 col-md-6">
            <div class="card rounded-card user-card">
                <div class="card-block">
                    <div class="img-hover">
                        <img class="img-fluid img-radius" src="{{asset('img/home.jpg')}}" alt="round-img">
                        <div class="img-overlay img-radius">
                            <span>
                                <a href="#" class="btn btn-sm btn-danger" data-popup="lightbox"><i class="icofont icofont-love"></i></a>
                                <a href="" class="btn btn-sm btn-primary"><i class="icofont icofont-link-alt"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="job-lable">
                        <label class="label badge-success">Bisa Booking</label>
                        <label class="label badge-info">
                            <input type="hidden" value="{{$kamar = $item->stok_kamar - $cek->count()}}">
                            @if ($kamar == 0)
                             Kamar Penuh 
                            @else
                            Tersisa {{$kamar}} Kamar {{$cek->count()}}
                            @endif
                        </label>
                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>Rp. 800.000 / bulan</div>
                        <div class="job-meta-data"><i class="icofont icofont-location-pin"></i>Jakarta</div>
                    </div>
                        <h6 class="">{{$item->nama_kamar}}</h6>
                        <p class="m-b-0 text-muted">update {{$item->updated_at->format('d F Y')}}</p>
                        <a href="{{url('detail-kamar-kos', $item->id)}}" target="_blank" class="btn btn-primary btn-block btn-sm">Detail</a>
                    </div>
                <div class="job-badge">
                    @if ($item->jenis_kamar == "Putra")
                        <label class="label bg-danger"> {{$item->jenis_kamar}}</label>
                    @elseif($item->jenis_kamar == "Putri")
                        <label class="label bg-warning"> {{$item->jenis_kamar}}</label>
                    @elseif($item->jenis_kamar == "Campur")
                        <label class="label bg-default"> {{$item->jenis_kamar}}</label>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- End Kos --}}

    {{-- Start Card Wilayah --}}
    <div class="card">
        <div class="card-header">
            <h5>Kota Besar</h5>

        </div>
        <div class="card-block box-list">
            <div class="row">
                <div class="col-lg-3">
                    <div class="p-20 z-depth-top-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">
                        <p class="text-sm-center">Use class <code>z-depth-top-0</code> inside div element to add box-shadow.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-20 z-depth-top-1 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-1">
                        <p class="text-sm-center ">Use class <code>z-depth-top-1</code> inside div element to add box-shadow.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-20 z-depth-top-2 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-2">
                        <p class="text-sm-center">Use class <code>z-depth-top-2</code> inside div element to add box-shadow.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-20 z-depth-top-3 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-3">
                        <p class="text-sm-center">Use class <code>z-depth-top-3</code> inside div element to add box-shadow.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-20 z-depth-top-4 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-4">
                        <p class="text-sm-center">Use class <code>z-depth-top-4</code> inside div element to add box-shadow.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-20 z-depth-top-5 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-5">
                        <p class="text-sm-center">Use class <code>z-depth-top-5</code> inside div element to add box-shadow.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Wilayah -->
@endsection