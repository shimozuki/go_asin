@extends('layouts.backend.app')
@section('title','Booking List')

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
<section id="basic-datatable">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data booking</h4>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table zero-configuration">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th class="text-nowrap">Nomor Transaksi</th>
                      <th class="text-nowrap">Nama</th>
                      <th class="text-nowrap">Nama penyewa</th>
                      <th class="text-nowrap">No Telp</th>
                      <th class="text-nowrap">Keterangan</th>
                      <th class="text-nowrap">Status Transaksi</th>
                      <th class="text-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no=1;
                    @endphp
                    @foreach ($booking as $bookings)
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$bookings->transaction_number}}</td>
                        <td>{{$bookings->tanah->nama}}</td>
                        <td>{{getNameUser($bookings->user_id)}}</td>
                        <td><a href="https://wa.me/{{getTlpUser($bookings->user_id)}}?text=Assalamualaikum%20{{getNameUser($bookings->user_id)}}%20saya%20pemilik%20tanah">{{getTlpUser($bookings->user_id)}}</a></td>
                        <td>{{$bookings->lama_sewa}} Bulan</td>
                        <td>{{$bookings->payment->status}}</td>
                        <td>
                          @if ($bookings->status == 'Pending')
                            <a href="{{url('pemilik/room', $bookings->key)}}">Konfirmasi</a>
                          @elseif($bookings->status == 'Proses')
                            <span class="badge badge-primary">Aktif</span>
                          @elseif($bookings->status == 'Done')
                            <span class="badge badge-info">Selesai</span>
                          @elseif($bookings->status == 'Cancel')
                            <span class="badge badge-warning">Cancel</span>
                          @elseif($bookings->status == 'Reject')
                            <span class="badge badge-danger">Reject</span>
                          @endif
                        </td>
                      </tr>
                    @php
                      $no++;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
@endsection