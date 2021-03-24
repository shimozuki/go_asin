@extends('layouts.backend')
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
  @section('title_page','Data Kamar')
<div class="panel panel-inverse">
  <!-- begin panel-heading -->
  <div class="panel-heading">
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
    </div>
    <h4 class="panel-title">Data Kamar
    </h4>
  </div>
  <!-- end panel-heading -->
  <!-- begin panel-body -->
  <div class="panel-body">
    <table id="data-table-default" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th width="1%">No</th>
          <th class="text-nowrap">Nama Kamar</th>
          <th class="text-nowrap">Type Kamar</th>
          <th class="text-nowrap">Jenis Kamar</th>
          <th class="text-nowrap">Tersedia</th>
          <th class="text-nowrap">Harga Kamar</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($kamar as $item)
          <tr>
            <td>{{$no}}</td>
            <td>{{$item->nama_kamar}}</td>
            <td>{{$item->kategori}}</td>
            <td>{{$item->jenis_kamar}}</td>
            <td>{{$item->stok_kamar}}</td>
            <td>{{$item->harga_kamar}}</td>
            <td class="text-center">
              <a href="{{route('kamar.show', $item->slug)}}" class="btn btn-info btn-sm">Show</a>
              <a href="{{route('kamar.edit', $item->slug)}}" class="btn btn-warning btn-sm">Edit</a>
            </td>
          </tr>
          @php
              $no++;
          @endphp
          @endforeach
      </tbody>
    </table>
  </div>
  <!-- end panel-body -->
</div>
@endsection