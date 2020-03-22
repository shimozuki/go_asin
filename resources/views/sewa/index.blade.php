@extends('layouts.backend')
@section('title','Sewa Kamar Kos')
@section('content')
<!-- Choose Your Payment Method start -->
<div class="row">
    @foreach ($sewa as $item)
        <div class="col-12 col-xl-6 col-lg-6">
            <div class="card">
                <div class="body-card" style="height:300px">
                    <div class="demo-container card-block">
                        <h4 class="mt-2 pl-2">{{$item->nama_kamar}}</h4>
                        <span class="pl-2">Kos Khusus </span><span>{{$item->jenis_kamar}}</span>
                    </div>
                </div>
            </div>
        </div>
    @if ($cek)
        <div class="col-12 col-xl-6 col-lg-6">
            <div class="card">
                <div class="body-card" style="height:auto">
                    <div class="demo-container card-block">
                    <h4 class="mt-2 pl-2 text-center">
                        Kamu masih ada pembayaran yang belum selesai <br>
                        <a href="{{route('payment.create')}}" class="btn btn-primary">Selesaikan Pembayaran</a>
                    </h4>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="col-12 col-xl-6 col-lg-6">
        <div class="card">
            <div class="body-card" style="height:auto">
                <div class="tab-pane active" id="credit-card" role="tabpanel">
                    <div class="demo-container card-block">
                        <div class="row">
                            <div class="col-12 col-xl-6 col-lg-6">
                                <div class="card-wrapper"></div>
                            </div>
                            <div class="col-12 col-xl-12 col-lg-12">
                                <form action="{{url('sewa-kamar-kos')}}" class="payment-form" method="POST">
                                    @csrf
                                    <input type="hidden" name="kamar_id" value="{{$item->id}}">
                                    <div class="row">
                                        <div class="col-12 col-xl-6 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{$item->nama_bank}}  {{$item->no_rek}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6 col-lg-6">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" value="@currency($item->harga_kamar)" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="lama_sewa" class="form-control" required>
                                            <option value="">--Lama Sewa--</option>
                                            <option value="1">1 Bulan</option>
                                        </select>
                                        <small class="f-s-12 text-grey-darker">NOTE : mohon maaf, untuk saat ini hanya bisa sewa 1 bulan</small>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="notes" class="form-control" rows="3" placeholder="Pesan (optional)"></textarea>
                                    </div>
                                    <div class="text-center">
                                        @if ($item->user_id == auth::user()->id)
                                        @else
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Kirim</button>
                                        <a href="" class="btn btn-warning waves-effect waves-light">Batal</a>
                                        @endif
                                    </div>
                                    <input type="hidden" name="pemilik_id" value="{{$item->id_user}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<!-- Choose Your Payment Method end -->
@endsection