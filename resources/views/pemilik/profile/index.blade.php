@extends('layouts.backend')
@section('title','Data Profile')
@section('content')
    <div class="row">
        @foreach ($profil as $item)
        <div class="col-12 col-xl-3 col-lg-3">
            <div class="card">
                <div class="card-header contact-user text-center">
                    <img class="img-radius img-40 mb-3" src="{{asset('backend\img\user\user-12.jpg')}}" alt="contact-user">
                    <h5 class="m-l-10">  
                        @if ($item->nama_bank == "" or $item->no_rek == "" or $item->no_telp == "" or $item->no_ktp == "" or $item->no_npwp == "" or $item->foto == "")
                            <a href="{{route('owner.edit', $item->id)}}">{{$item->name}}
                            </a>
                        @else
                            <a href="{{route('owner.edit', $item->id)}}">{{$item->name}}
                                <span class="text-danger" style="font-size:10px">Edit Profil</span>
                            </a> 
                        @endif  
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-9 col-lg-9">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12 col-xl-6">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Pemilik</th>
                                        <td><a href="{{route('owner.edit', $item->id)}}">{{$item->name}}</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{$item->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. Telepon</th>
                                        <td>
                                                {{$item->no_telp}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. KTP</th>
                                        <td>
                                                {{$item->no_ktp}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. NPWP</th>
                                        <td>
                                                {{$item->no_npwp}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end of table col-lg-6 -->
                    <div class="col-lg-12 col-xl-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Bank</th>
                                        <td>
                                                {{$item->nama_bank}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. Rekening</th>
                                        <td>
                                                {{$item->no_rek}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end of table col-lg-6 -->
                </div>
                <!-- end of row -->
            </div>
        </div>
        @endforeach
    </div>
@endsection