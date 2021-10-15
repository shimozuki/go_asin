@extends('layouts.backend.app')
@section('title')
  {{$confirm->tanah->nama}}
@endsection
@section('content')
<div class="row">

  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="font-weight-bold">Konfirmasi Pembayaran</h4>
        <h6>Approve Pembayaran jika data pembayaran dari penyewa sudah sesuai.</h6>
        <hr>
        <form action="{{url('pemilik/payment-confirm',$confirm->id)}}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="Tanggal Approve">Tanggal Approve</label>
            <input type="text" class="form-control" value="{{date('d l Y')}}" readonly disabled>
          </div>

          <div class="form-group">
            <label for="Jumlah">Jumlah</label>
            <input type="text" value="{{rupiah($confirm->payment->jumlah_bayar)}}" class="form-control" readonly disabled>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Approve</button>
            <a data-id-reject="{{$confirm->id}}" id="reject" class="btn btn-warning mr-sm-1 mb-1 mb-sm-0">Reject</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h6>Detail Pembayaran Dari Penyewa.</h6>
      </div>
    </div>
    <div class="card shadow">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <span>
            <h6>Nama         : {{$confirm->payment->nama_pemilik}}</h6>
            <h6>BANK         : {{$confirm->payment->nama_bank}}</h6>
            <h6>Tgl transfer : {{$confirm->payment->tgl_transfer}}</h6>
            <h6>Jumlah       : {{rupiah($confirm->payment->jumlah_bayar)}}</h6>
          </span>
          <span style="font-size: 21px">
            <i class="feather icon-credit-card"></i>
          </span>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <span>
            <img src="{{asset('bukti/' .$confirm->payment->bukti)}}" width="50%" alt="">
          </span>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <span>
            {{$confirm->tanah->nama}} <br>
            {{$confirm->lama_sewa}} Bulan Sewa
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script src="{{asset('ctrl/backend/confirm.js')}}"></script>
@endsection