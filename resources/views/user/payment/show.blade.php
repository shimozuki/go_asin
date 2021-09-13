@extends('layouts.backend.app')
@section('title')
  Konfirmasi Pembayaran Sewa
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h6>Jumlah akan ditentukan dari paket pilihan kamu. Silahkan transfer sesuai dengan jumlah yang ditentukan.</h6>
      </div>
    </div>
    <div class="card shadow">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <span>
            {{rupiah($transaksi->harga_total)}}
          </span>
          <span style="font-size: 21px">
            <i class="feather icon-credit-card"></i>
          </span>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <span>
            {{getNamaBank($transaksi->pemilik_id)}} <br>
            {{getNoRek($transaksi->pemilik_id)}} <br>
            {{getNamePemilikBank($transaksi->pemilik_id)}}
          </span>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <span>
            {{$transaksi->tanah->nama}} <br>
            {{$transaksi->lama_sewa}} Bulan Sewa
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="font-weight-bold">Lakukan Konfirmasi Pembayaran</h4>
        <h6>Silahkan lakukan konfirmasi ketika Anda sudah melakukan transfer.</h6>
        <hr>
        <form action="{{url('user/konfirmasi-payment',$transaksi->id)}}" enctype="multipart/form-data" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="Atas Nama">Atas Nama</label>
            <input type="text" name="nama_pemilik" class="form-control" placeholder="Atas Nama" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="Bank Kamu">Bank Kamu</label>
            <input type="text" name="nama_bank" class="form-control" placeholder="Bank Kamu" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="Bank Tujuan">Bank Tujuan</label>
            <select name="bank_tujuan"class="form-control">
              <option>Pilih Bank Tujuan</option>
              <option value="BNI">BNI</option>
              <option value="BRI">BRI</option>
              <option value="BCA">BCA</option>
              <option value="MANDIRI">MANDIRI</option>
            </select>
          </div>

          <div class="form-group">
            <label for="Tanggal Transfer">Tanggal Transfer</label>
            <input type="text" name="tgl_transfer" class="form-control" placeholder="Tanggal Transfer">
          </div>

          <div class="form-group">
            <label for="Jumlah">Jumlah</label>
            <input type="text" value="{{rupiah($transaksi->harga_total)}}" class="form-control" placeholder="Jumlah" readonly disabled>
          </div>

          <div class="form-group">
            <label class="col-form-label">Bukti Transfer</label>
            <input type="file" name="bukti" class="form-control" required>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Konfirmasi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection