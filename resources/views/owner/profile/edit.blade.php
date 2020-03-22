@extends('layouts.backend')
@section('title','Data Profiles')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-3 col-lg-3">
            <div class="card">
                <div class="card-header contact-user">
                    <img class="img-radius img-40" src="{{asset('backend\img\user\user-1.jpg')}}" alt="contact-user">
                    <h5 class="m-l-10">{{$profil->name}}</h5>
                </div>
                <div class="card-block groups-contact">
                    <ul class="list-group">
                        <li class="list-group-item justify-content-between">
                            Jumlah Kamar 
                            <span class="badge badge-primary badge-pill">30</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            Kamar Tersedia
                            <span class="badge badge-success badge-pill">20</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            Kamar Tersewa
                            <span class="badge badge-info badge-pill">100</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            Schedule
                            <span class="badge badge-danger badge-pill">50</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-9 col-lg-9">
            <div class="card">
                <form action="{{route('owner.update', $profil->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <div class="row">
                    <div class="col-12 col-xl-6 col-lg-6">
                        <div class="form-group ml-2 mr-2 mt-3">
                            <input type="text" class="form-control" value="{{$profil->name}}" readonly>
                        </div>
                        <div class="form-group ml-2 mr-2 mt-3">
                            <input type="email" class="form-control" value="{{$profil->email}}" readonly>
                        </div>
                        <div class="form-group ml-2 mr-2 mt-3">
                            <input type="text" name="no_telp" class="form-control" value="{{$profil->no_telp}}" placeholder="No Telepon" required>
                        </div>
                        <div class="form-group ml-2 mr-2 mt-3">
                            <input type="text" name="no_npwp" class="form-control" value="{{$profil->no_npwp}}" placeholder="No NPWP">
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 col-lg-6">
                        <div class="form-group mr-2 ml-2 mt-3">
                            <input type="text" name="nama_bank" class="form-control" value="{{$profil->nama_bank}}" placeholder="Nama Bank" required>
                        </div>
                        <div class="form-group mr-2 ml-2 mt-3">
                            <input type="text" name="no_rek" class="form-control" value="{{$profil->no_rek}}" placeholder="No. Rekening" required>
                        </div>
                        <div class="form-group mr-2 ml-2 mt-3">
                            <input type="text" name="no_ktp" class="form-control" value="{{$profil->no_ktp}}" placeholder="No KTP" required>
                        </div>
                        <div class="form-group mr-2 ml-2 mt-3">
                            <input type="file" name="foto" class="form-control" value="{{$profil->foto}}" placeholder="Foto Profile" required>
                        </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-sm ml-4">Submit</button>
                        <a href="{{route('owner.index')}}" class="btn btn-warning btn-sm">Batal</a>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection