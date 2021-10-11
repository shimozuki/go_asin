@extends('layouts.backend.app')
@section('title','Data Kosan')
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
    <div class="col-12">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Data List Rumah
                <a href="{{route('tanah.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
              </h4>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table zero-configuration">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th class="text-nowrap">Nama Perumahan</th>
                      <th class="text-nowrap">Type Rumah</th>
                      <th class="text-nowrap">Tersedia</th>
                      <th class="text-nowrap">Sisa</th>
                      <th class="text-nowrap">Harga Sewa Rumah</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($tanah as $item)
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->kategori}}</td>
                        <td>{{$item->stok}}</td>
                        <td>{{$item->sisa}}</td>
                        <td>{{$item->harga_sewa}}</td>
                        <td class="text-center">
                          <a href="{{route('tanah.show', $item->slug)}}" class="btn btn-info btn-sm">Show</a>
                          <a href="{{route('tanah.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                          <a href="{{ route('pemilik.tanah', $item->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data {{$item->nama}}?')">Delete</a>
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