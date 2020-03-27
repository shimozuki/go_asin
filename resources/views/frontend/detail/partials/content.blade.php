<div class="container">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-9 -->
        <div class="col-md-8">
            <div class="panel panel-forum">
                <div class="panel-heading">
                    @foreach ($detail as $item)
                    <h4 class="panel-title" style="color:black; font-weight:bold; font-size:15px">{{$item->nama_kamar}}</h4>
                </div>
                <div class="panel-body">
                        <a href="" class="btn btn-default">Simpan</a>
                        <a href="" class="btn btn-default">Bagikan</a>
                        <button disabled="disabled" class="btn btn-info" style="float:right; font-weight:bold">Khusus {{$item->jenis_kamar}}</button>

                        <div class="row" style="margin-top:5%">
                            <div class="col-lg-6 col-sm-6">
                                <p style="margin-top:5%">
                                    <b style="font-size:15px">Luas Kamar</b>
                                    <p> - {{$item->luas_kamar}}</p>
                                </p>
        
                                <p style="margin-top:5%">
                                    <b style="font-size:15px">Fasilitas Kamar</b>
                                    @foreach ($item->fkamars as $a)
                                        <p>- {{$a->fkamar_name}}</p>
                                    @endforeach
                                </p>
        
                                <p style="margin-top:5%">
                                    <b style="font-size:15px">Fasilitas Kamar Mandi</b>
                                    @foreach ($item->fkamar_mandis as $km)
                                       <p> - {{$km->fkamar_mandi}}</p>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <p style="margin-top:5%">
                                    <b style="font-size:15px">Fasilitas Parkir</b>
                                    @foreach ($item->fparkirs as $parkir)
                                        <p>- {{$parkir->fparkir_name}}</p>
                                    @endforeach
                                </p>
        
                                <p style="margin-top:5%">
                                    <b style="font-size:15px">Area Lingkungan</b>
                                    @foreach ($item->areas as $area)
                                        <p>- {{$area->area_name}}</p>
                                    @endforeach
                                </p>
                                
                                <p style="margin-top:5%">
                                    <b style="font-size:15px">Fasilitas Bersama</b>
                                    @foreach ($item->fbersamas as $bersama)
                                    <p>- {{$bersama->fbersama_name}}</p>
                                    @endforeach
                                </p>
                            </div>
                        </div>       
                        <div class="keterangan" style="margin-top:5%">
                            <p style="margin-top:5%">
                                <b style="font-size:15px">Keterangan Lain</b>
                                <p>Keterangan.....</p>
                            </p>
    
                            <p style="margin-top:5%">
                                <b style="font-size:15px">Keterangan Biaya Lain</b>
                                <p>Keterangan.....</p>
                            </p>
    
                            <p style="margin-top:5%">
                                <b style="font-size:15px">Deskripsi Kost</b>
                                <p>Keterangan.....</p>
                            </p>     
                        </div>           
                    @endforeach
                </div>
            </div>
            <!-- end comment-section -->
        </div>
        <!-- end col-9 -->
        <!-- begin col-3 -->
        <div class="col-md-4">
            <!-- begin panel-forum -->
            <div class="panel panel-forum">
                <div class="panel-heading">
                    <h4 class="panel-title" style="color:black">Pesan / Booking Sekarang Kakak</h4>
                </div>
                <!-- begin threads-list -->
                    <div class="panel-body">
                        <button disabled="disabled" class="btn btn-danger" style="font-weight:bold">
                            @if ($item->sisa_kamar == 0)
                             Kamar Penuh
                            @else
                            Tersisa {{$item->sisa_kamar}} Kamar
                            @endif
                        </button>

                        <div class="row" style="margin-top:5%">
                            <div class="col-md-12">
                                <span style="color:black; font-weight:bold; font-size:15px; float:left">Per Bulan</span>
                                <span style="color:black; font-weight:bold; font-size:15px;float:right">@currency($item->harga_kamar)</span>
                            </div>
                        </div>
                        <hr>
                        <p style="color:black">Terakhir Update {{$item->updated_at->format('d-m-Y')}}</p>
                        <p>Data sewaktu-waktu bisa berubah</p>
                        <div class="row text-center">
                            @if ($item->id_user == $auth)
                                <button disabled="disabled" class="btn btn-info btn-block">Ini Kos Punya Kamu</button>
                            @else
                                @if ($item->user_id == $auth )
                                    @if ($item->status == "Menunggu Pembayaran")
                                        <a href="{{route('payment.create')}}" class="btn btn-warning btn-block">Menunggu Pembayaran</a>
                                    @elseif($item->status == "Lunas" && $item->user_id == auth::user()->id)
                                        <a href="{{url('my-room')}}" class="btn btn-primary btn-block">Ini Kamar Kamu</a>
                                    @elseif($item->status == "Proses")
                                        <button disabled="disabled" class="btn btn-warning btn-block">Pesanan Kamar Sedang Di Proses</button>
                                    @else
                                        <div class="col-md-6">
                                            <a href="{{url('sewa-kamar-kos', $item->id)}}" class="btn btn-success btn-block">Pesan Kost</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{url('booking-kamar', $item->id)}}" class="btn btn-primary btn-block">Booking</a>
                                        </div>    
                                    @endif
                                @elseif(@auth::user()->role == 'Owner')
                                    <button disabled="disabled" class="btn btn-warning btn-block">Hanya Untuk Pencari Kossan</button>
                                @else
                                    @if ($item->sisa_kamar > 0 || auth::user()->role == "User" )
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-6">
                                                <a href="{{url('sewa-kamar-kos', $item->id)}}" class="btn btn-success btn-block">Pesan Kosts</a>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-6">
                                                <a href="{{url('booking-kamar', $item->id)}}" class="btn btn-primary btn-block">Booking</a>
                                            </div>
                                        </div>
                                    @endif 
                                @endif
                            @endif
                        </div>
                        <p style="margin-top:2%">Pastikan kamu sudah membaca deskripsi dan fasilitas kost ini</p>
                    </div>
                <!-- end threads-list -->
            </div>
            <!-- end panel-forum -->
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
</div>