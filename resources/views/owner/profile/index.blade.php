@extends('layouts.index')
@section('title','Data Profile')
@section('content')
    <div class="row">
        @foreach ($profil as $item)
        <div class="col-3">
            <div class="card">
                <div class="card-header contact-user">
                    <img class="img-radius img-40 mb-3" src="..\files\assets\images\avatar-4.jpg" alt="contact-user">
                    <h5 class="m-l-10">
                        @foreach ($item->profils as $a)
                            @if ($a->user_id == "")
                                <a href="{{route('owner.edit', $item->id)}}">{{$item->name}}
                                    <span class="text-danger" style="font-size:10px">Lengkapi Profil</span>
                                </a>
                            @else
                                <a href="">{{$item->name}}
                                    <span class="text-danger" style="font-size:10px">Edit Profil</span>
                                </a>
                            @endif
                        @endforeach    
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12 col-xl-6">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Pemilik</th>
                                        <td>{{$item->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{$item->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. Telepon</th>
                                        <td>
                                            @foreach ($item->profils as $a)
                                                {{$a->no_telp}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. KTP</th>
                                        <td>
                                            @foreach ($item->profils as $a)
                                                {{$a->no_ktp}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. NPWP</th>
                                        <td>
                                            @foreach ($item->profils as $a)
                                                {{$a->no_npwp}}
                                            @endforeach
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
                                            @foreach ($item->profils as $a)
                                                {{$a->nama_bank}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. Rekening</th>
                                        <td>
                                            @foreach ($item->profils as $a)
                                                {{$a->no_rek}}
                                            @endforeach
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