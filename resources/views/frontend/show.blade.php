@extends('layouts.frontend.index')
@section('title')
  {{$tanah->nama}}
@endsection
@section('card')
<div class="container">
  <div class="row">
    <div class="col-md-8 mt-3 mb-3">
      <div class="card shadow">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($tanah->fotokamar as $key => $slider)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img src="{{asset('foto_kamar/' .$slider->foto_kamar)}}" class="d-block w-100"  alt="..."> 
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
      </div>
    </div>

    <div class="col-md-4 mt-3 mb-3">
      <div class="card shadow" style="height: 350px">
        <div class="d-flex" style="margin: 5%">
          <img src="https://cdn.pixabay.com/photo/2018/08/28/13/29/avatar-3637561_1280.png" width="50px" height="50px" class="rounded">
          <div class="pl-3">
            <span class="font-weight-bold" style="font-size: 20px; color:black">{{getNameUser($tanah->user_id)}}</span>
            <p style="font-size: 12px; margin-top:-5%">Pemilik - Aktif Sejak {{monthyear($tanah->user->created_at)}} </p>
          </div>
        </div>
        <!-- <div class="pl-3">
          <i class="fas fa-user mr-1" style="color: darkolivegreen"></i>
          <span style="color: black">Kos {{$tanah->jenis_kamar}}</span> <br>
        </div> -->
        <div class="pl-3">
          <span class="badge badge-info">{{$tanah->kategori}}</span>
        </div>
        <div class="pl-3">
          <i class="fas fa-calendar-check mr-1" style="color: darkolivegreen"></i>
          <span style="color: black">{{getTransaksiSuccess(!empty($tanah->transaksi->user_id) ? $tanah->transaksi->user_id : '')}} Transaksi Berhasil</span> <br>
        </div>
        <div class="pl-3">
          <i class="fas fa-calendar-week mr-1" style="color: darkolivegreen"></i>
          <span style="color: black">Tersedia {{$tanah->sisa}} Tanah </span> <br>
        </div>
      </div>
    </div>

    {{-- Detail --}}
    <div class="col-md-8 col-sm-12 col-12 mb-3">
      <div class="card shadow">
        <div class="card-body">
          <p class="font-weight-bold" style="font-size: 20px; color:black"> {{$tanah->nama}} </p>
          <div class="mb-3">
          <div>
              <p style="margin-left: 81%; margin-top: -8%;">
              <span class="badge badge-info">{{$tanah->kategori}}</span>
              </p>
            </div>
            <!-- <span style=" color:black">
              {{$tanah->jenis_kamar}} - {{getNameProvinsi($tanah->provinsi_id)}}
              - Tersisa {{$tanah->sisa}} Kamar
            </span> -->
          </div>
          <div class="d-flex justify-content-between">
            <div>
              <p style="font-size: 14px">
                Terakhir diupdate {{forDate($tanah->updated_at)}}
              </p>
            </div>
            <div>
              <p style="font-size: 14px">
                Simpan <i class="fa fa-heart"></i>
              </p>
            </div>
          </div>
          <h6 class="font-weight-bold">Luas</h6>
          <p style="font-size: 14px">
            {{$tanah->luas}}
          </p>
          @if (DB::table('tanahs()->kategori') == 'tanah dan bangunan')
          <h6 class="font-weight-bold">Fasilitas Yang Didapat</h6>
          <p style="font-size: 14px">
            <div class="row">
              <div class="col-md-6">
                {{-- Fasilitas Bangunan --}}
                @foreach ($tanah->fbangunan as $fbangunan)
                  {{$fbangunan->name}} <br>
                @endforeach

                {{-- Fasilitas Kamar Mandi --}}
                @foreach ($tanah->kmandi as $kmandi)
                  {{$kmandi->name}} <br>
                @endforeach
              </div>
              <div class="col-md-6">
                {{-- Fasilitas Bersama --}}
                @foreach ($tanah->fbersama as $fbersama)
                  {{$fbersama->name}} <br>
                @endforeach

                {{-- Fasilitas Parkir --}}
                @foreach ($tanah->fparkir as $fparkir)
                  {{$fparkir->name}} <br>
                @endforeach
              </div>
            </div>
          </p>
          @endif
          <h6 class="font-weight-bold">Lingkungan</h6>
          <div class="d-flex justify-content-between">
            <p style="font-size: 14px">
              {{-- Fasilitas Umum --}}
              @foreach ($tanah->area as $area)
                {{$area->name}} <br>
              @endforeach
            </p>
          </div>
          <h6 class="font-weight-bold">Ditail Alamat</h6>
          <div class="d-flex justify-content-between">
            <p style="font-size: 14px">
              {{-- Fasilitas Umum --}}
                {{$tanah->ket_lain}} <br>
            </p>
          </div>
          <h6 class="font-weight-bold">Keterangan Pembayaran</h6>
          <div class="d-flex justify-content-between">
            <p style="font-size: 14px">
              {{-- Fasilitas Umum --}}
                {{$tanah->ket_biaya}} <br>      
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Proses --}}
    <div class="col-md-4 col-sm-12 col-12 mb-3">
      <form action="{{route('sewa.store', $tanah->id)}}" method="post">
        @csrf
        <div class="card shadow">
          <div class="card-body">
            <p> {{rupiah($tanah->harga_sewa)}} / Bulan</p>
            <select class="DropChange" id="hargasewa" hidden>
              <option value="{{$tanah->harga_sewa}}" selected></option>
            </select>
            <div class="d-flex">
              <input type="text" name="tgl_sewa" class="form-control datepicker mr-2" id="datepicker" placeholder="Mulai Sewa"  autocomplete="off" required>
              <select name="lama_sewa" id="lamasewa" class="form-control datepicker DropChange">
                <option>Lama Sewa</option>
                <option value="1">1 Bulan</option>
                <option value="3">3 Bulan</option>
                <option value="6">6 Bulan</option>
                <option value="12">1 Tahun</option>
              </select>
            </div>
            <small>Kamu bisa mengajukan Penyewaan 2 bulan dari sekarang.</small>
          </div>
        </div>
        <div class="card shadow">
          <div class="card-body" id="tampil">
            <div class="d-flex justify-content-between">
              <div>
                <p>Harga Sewa <br>
                  Biaya Admin <br>
                  Deposit <br>
                  Point
                </p>
              </div>
              <div>

                <p style="color: black">
                  <span id="sewatanah"></span> <br>
                  Rp. 10.000.00 <br>
                  Rp. 300.000 <br>
                  + 2 Points
                </p>
                <input type="hidden" class="DropChange" id="depost" value="300000">
                <input type="hidden" class="DropChange" id="biayadmin" value="10000">
                @auth
                  <input type="hidden" class="DropChange" id="points" value="{{calculatePointUser(Auth::id())}}">
                @endauth
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                @auth
                <div>
                  <div class="custom-control custom-switch custom-switch-danger switch-md mr-2 mb-1">
                    <input type="checkbox" name="credit" class="custom-control-input" id="useCredit" value="false">
                    <label class="custom-control-label" for="useCredit">
                    </label>
                  </div>
                </div>
                <div>
                {{getPointUser(Auth::id())}} Points ( {{rupiah(calculatePointUser(Auth::id()))}} )
                </div>
                @endauth
            </div>
            <hr>
            <div class="d-flex justify-content-between">
              <div>
                <p style="text-decoration:underline; color:black">
                  Total Pembayaran
                </p>
              </div>
              <div id="harga">
                <p style="color: black" id="hargatotal"></p>
              </div>
              <p id="show">
                <span style="color: black" id="hargatotalpoints"></span>
              </p>
            </div>

            @auth
              @if (Auth::user()->role == 'Pencari')
                <button type="submit" class="btn btn-success btn-block">Ajukan Sewa</button>
              @else
                <button disabled="disabled" class="btn btn-info btn-block">Hanya Login Sebagai Pencari</button>
              @endif
            @else
              <a href="{{route('login')}}" class="btn btn-outline-primary btn-block">Masuk</a>
            @endauth
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection