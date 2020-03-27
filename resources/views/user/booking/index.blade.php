@extends('layouts.backend')
@section('title','Booking Kamar')
@section('content')
<div class="row">
    <div class="col-xl-6 lg-6 col-12">
        <div class="card">
                <h3 class="card-header pl-2 pt-2">Detail Kamar</h3>
            <div class="body-card">
                <div class="demo-container card-block">
                    @foreach ($kamar as $item)
                        <h5 class="mt-2 pl-0">Nama Kosan : {{$item->nama_kamar}}</h5>
                        <span class="pl-2">Kos Khusus </span>{{$item->jenis_kamar}}<span></span> <br>
                        <span class="pl-2">Luas Kamar </span>{{$item->luas_kamar}}<span></span> <br>
                        <span class="pl-2">Harga Kamar </span>@currency($item->harga_kamar)<span></span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 lg-6 col-12">
        <div class="card">
            <h3 class="card-header pl-2 pt-2">
                Form Booking
            </h3>
            <div class="body-card">
                <div class="demo-container card-block">
                    <form action="{{url('booking-kamar')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" name="tgl_book" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Lama Sewa</label>
                                    <input type="text" value="1 Bulan (Untuk saat ini hanya bisa sewa 1 bulan)" class="form-control" readonly>
                                </div>

                                <span id="select_nama_kamar"></span>
                                <span id="select_harga_kamar"></span>
                                <span id="select_nama_bank"></span>
                                <span id="select_no_rek"></span>

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Bank</label>
                                            <input type="text" value="{{$item->nama_bank}}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>No. Rekening</label>
                                            <input type="text" value="{{$item->no_rek}}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea name="notes" class="form-control" rows="3" placeholder="Optional"></textarea>
                                </div>
                                <input type="hidden" id="kamar_id" name="kamar_id" value="{{$item->id}}" readonly>
                                <input type="hidden" id="id_user" name="pemilik_id" value="{{$item->id}}" readonly>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Booking</button>
                                    <a href="" class="btn btn-warning waves-effect waves-light">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
    </script>
@endsection