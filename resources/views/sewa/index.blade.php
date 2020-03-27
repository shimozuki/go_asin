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
                                    <input type="hidden" id="kamar_id" name="kamar_id" value="{{$item->id}}">
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
                                    <span id="select_nama_kamar"></span>
                                    <span id="select_harga_kamar"></span>
                                    <span id="select_nama_bank"></span>
                                    <span id="select_no_rek"></span>
                                    <span id="select_email-pemilik"></span>
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
                                    <input type="hidden" name="nama_pemilik" value="{{$item->name}}" readonly>
                                    <input type="hidden" id="id_user" name="pemilik_id" value="{{$item->id_user}}" readonly>
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
@section('scripts')
    <script type="text/javascript">
        // Select Nama Kamar 
        $(document).ready(function() {
        var id = $("#kamar_id").val();
                $.get('{{ Url("get-nama-kamar") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select_nama_kamar").html(resp);
            });
        });

        $(document).on('change', '#kamar_id', function (e) { 
        var id = $(this).val();
            $.get('{{ Url("get-nama-kamar") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select_nama_kamar").html(resp);
            });
        });

        // Select Harga Kamar
        $(document).ready(function() {
        var id = $("#kamar_id").val();
                $.get('{{ Url("get-harga-kamar") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select_harga_kamar").html(resp);
            });
        });

        $(document).on('change', '#kamar_id', function (e) { 
        var id = $(this).val();
            $.get('{{ Url("get-harga-kamar") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select_harga_kamar").html(resp);
            });
        });

        // Select Nama Bank
        $(document).ready(function() {
        var id_user = $("#id_user").val();
                $.get('{{ Url("get-nama-bank") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id_user:id_user}, function(resp){  
                $("#select_nama_bank").html(resp);
            });
        });

        $(document).on('change', '#id_user', function (e) { 
        var id_user = $(this).val();
            $.get('{{ Url("get-nama-bank") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id_user:id_user}, function(resp){  
                $("#select_nama_bank").html(resp);
            });
        });

        // Select No Rek
        $(document).ready(function() {
        var id_user = $("#id_user").val();
                $.get('{{ Url("get-no-rek") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id_user:id_user}, function(resp){  
                $("#select_no_rek").html(resp);
            });
        });

        $(document).on('change', '#id_user', function (e) { 
        var id_user = $(this).val();
            $.get('{{ Url("get-no-rek") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id_user:id_user}, function(resp){  
                $("#select_no_rek").html(resp);
            });
        });

        // Select Email Pemilik
        $(document).ready(function() {
        var id_user = $("#id_user").val();
                $.get('{{ Url("get-email-pemilik") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id_user:id_user}, function(resp){  
                $("#select_email-pemilik").html(resp);
            });
        });

        $(document).on('change', '#id_user', function (e) { 
        var id_user = $(this).val();
            $.get('{{ Url("get-email-pemilik") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id_user:id_user}, function(resp){  
                $("#select_email-pemilik").html(resp);
            });
        });
    </script>
@endsection