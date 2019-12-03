@extends('layouts.index')
@section('title','Data Kamar')
@section('content')
<div class="row">
    @foreach ($kamar as $item)
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-block text-center">
                    <i class="feather icon-home text-c-lite-green d-block f-40"></i>
                    <h6 class="m-t-20"><span class="text-c-lite-green">{{$item->nama_kamar}}</span></h6>
                    <p class="m-b-20">{{$item->jenis_kamar}}</p>
                    <button class="btn btn-primary btn-sm btn-round">Detail Kamar</button>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-block text-center">
                <i class="feather icon-plus text-c-lite-green d-block f-40"></i>
                <h5 class="m-t-20">Tambah Kamar</h5>
                <p class="m-b-20">Tambah Type Kamar Yuk</p>
                <a href="{{route('kamar.create')}}" class="btn btn-warning btn-sm btn-round">Buat Kamar</a>
            </div>
        </div>
    </div>
</div>
@endsection