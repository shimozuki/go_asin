@extends('layouts.backend')
@section('title','Pembayaran Masuk')
@section('content')
<div class="row">
    <div class="col-lg-7">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-9">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Pembayaran Masuk</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Nama Pengirim</label>
                        <input class="form-control" type="text" placeholder="{{$kamar->nama_pengirim}}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">No rekening</label>
                        <input class="form-control" type="text" placeholder="{{$kamar->no_rek_pengirim}}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nama Bank</label>
                        <input class="form-control" type="text" placeholder="{{$kamar->nama_bank}}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Jumlah Transfer</label>
                        <input class="form-control" type="text" placeholder="@currency($kamar->jml_payment)" readonly />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tanggal Transfer</label>
                        <input class="form-control" type="text" placeholder="{{$kamar->tgl_kirim}}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Bukti Pembayaran</label> <br>
                        <a href="" class="btn btn-info btn-sm">Lihat</a>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <a id="setujui" data-setujui="{{$kamar->idsewa}}" data-payment="{{$kamar->sewa_ids}}" data-kamar="{{$kamar->id_kamar}}" class="btn btn-success btn-block text-white">Setujui</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning btn-block">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        // Terima Pembayaran
        $(document).on('click','#setujui', function () {
            var idsewa = $(this).attr('data-setujui');
            var id_kamar = $(this).attr('data-kamar');
            var sewa_ids = $(this).attr('data-payment');
            $.get(' {{Url("setujui-pembayaran")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),idsewa:idsewa,sewa_ids:sewa_ids,id_kamar:id_kamar}, function(resp){
                // window.location.href = '/dashboard';
                location.reload();
            });
        });
    </script>
@endsection