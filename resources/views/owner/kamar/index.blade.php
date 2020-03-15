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
                    <p class="m-b-20">Kamar tersedia {{$item->stok_kamar - $sisa->count()}} Kamar Dari {{$item->stok_kamar}} Kamar</p>
                    <a href="" class="btn btn-info btn-sm btn-round">Detail Kamar</a>
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
                @if (auth::user()->nama_bank == '' or auth::user()->no_rek == '' or auth::user()->no_telp == '')
                    <a href="{{route('owner.edit', auth::user()->id)}}" class="btn btn-danger btn-sm btn-round">Lengkapi Profil Dahulu</a>
                @else
                    <a href="{{route('kamar.create')}}" class="btn btn-warning btn-sm btn-round">Buat Kamar</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection