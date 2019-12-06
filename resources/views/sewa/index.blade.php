@extends('layouts.home')
@section('title','Sewa Kamar Kos')
@section('content')
<!-- Choose Your Payment Method start -->
<div class="row">
    @foreach ($sewa as $item)
    <div class="col-6">
        <div class="card">
            <div class="body-card" style="height:300px">
                
                    <h4 class="mt-2 pl-2">{{$item->nama_kamar}}</h4>
                    <span class="pl-2">Kos Khusus </span><span>{{$item->jenis_kamar}}</span>
                
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="body-card" style="height:300px">
                <div class="tab-pane active" id="credit-card" role="tabpanel">
                    <div class="demo-container card-block">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-wrapper"></div>
                            </div>
                            <div class="col-sm-12">
                                <form action="{{url('sewa-kamar-kos')}}" class="payment-form" method="POST">
                                    @csrf
                                    <input type="hidden" name="kamar_id" value="{{$item->id}}">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                    <input type="text" class="form-control" value="{{$item->nama_bank}}  {{$item->no_rek}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" value="{{$item->harga_kamar}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="lama_sewa" class="form-control" required>
                                            <option value="">Lama Sewa</option>
                                            <option value="1">1 Bulan</option>
                                            <option value="2">3 Bulan</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="12">1 Tahun</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="notes" class="form-control" rows="3" placeholder="Pesan (optional)"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Kirim</button>
                                        <a href="" class="btn btn-warning waves-effect waves-light">Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Choose Your Payment Method end -->
@endsection