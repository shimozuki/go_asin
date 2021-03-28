@extends('layouts.backend.app')
@section('title','Dashboard Pengguna')
@section('content')
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @elseif($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif

  @if (Auth::user()->payment != NULL && Auth::user()->payment->status == 'Pending')
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <p class="mb-0">
          Konfirmasi Pembayaran Kamar, <a href="{{url('user', Auth::user()->transaksi->key)}}">disini</a>
      </p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
      </button>
    </div>
  @endif
@endsection