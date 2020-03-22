@extends('layouts.backend')
@section('title','Pembayaran Kamar')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-9">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Form Pembayaran Kamar</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                @if (@$cek->status == "Menunggu Pembayaran")
                    <form action="{{route('payment.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" name="nama_pengirim" class="form-control" placeholder="Nama Pengirim" required />
                            </div>
                            <div class="form-group">
                                <label>No Rekening Bank</label>
                                <input type="number" name="no_rek_pengirim" class="form-control" placeholder="Nomor Rekening" required/>
                            </div>
                            <div class="form-group">
                               <div class="row">
                                   <div class="col-md-6">
                                        <label>Bank Yang Digunakan</label>
                                        <input type="text" name="nama_bank" class="form-control" placeholder="Contoh : BNI,BCA" required/>
                                   </div>
                                   <div class="col-md-6">
                                        <label>Jumlah Transfer</label>
                                        <input type="number" name="jml_payment" class="form-control" placeholder="Contoh : Jumlah Yang Transfer" required/>
                                    </div>
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tanggal Kirim</label>
                                        <input type="date" name="tgl_kirim" class="form-control" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Bukti Pengiriman (struck)</label>
                                        <input type="file" name="bukti_pembayaran" class="form-control" required/>
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                            <button type="submit" class="btn btn-sm btn-default">Cancel</button>
                        </fieldset>
                    </form>
                @else
                    <h4 class="text-center">Tidak Ada Pembayaran Tertunda</h4>
                @endif
            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>
</div>
@endsection