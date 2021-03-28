@extends('layouts.backend.app')
@section('title','Dashboard Pemilik')
@section('content')
@if (Auth::user()->kamar->payment->status == 'Success')
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <p class="mb-0">
        User Melakukan Pembayaran Kamar, <a href="">cek disini</a>
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
  </div>
@endif
@endsection