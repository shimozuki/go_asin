@extends('layouts.backend.app')
@section('title','Tambah Kosan')
@section('content')
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create New Campaign</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form action="{{route('tanah.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body ">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="col-form-label">Nama Perumahan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama blok atau nama perumahan" autocomplete="off" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Kategori Rumah</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">--Kategori Tanah--</option>
                                <option value="tanah kosong">tanah kosng</option>
                                <option value="tanah dan bangunan">tanah dan bagunan</option>
                            </select>Kamar
                        </div>
                        <div class="col-sm-3">
                        <label class="col-form-label">Kecematan</label>
                        <select name="provinsi_id" class="form-control kode" id="select2" required>
                            <option value="">-- Pilih Kecamatan --</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{$item->kode}}">{{$item->nama}}</option>
                                @endforeach
                        </select>
                    </div>
                    <span id="select-provinsi"></span>
                        <div class="col-sm-3">
                            <label class="col-form-label">Background Rumah</label>
                            <input type="file" name="bg_foto" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="col-form-label">Status Booking</label>
                            <select name="book" class="form-control" required>
                                <option value="">-- Aktif/Non-aktif --</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Luas Bangunan</label>
                            <input type="text" class="form-control" name="luas" placeholder="Contoh 3 x 4" required>
                        </div>
                        <div class="col-sm-3">
                            <label class=" col-form-label">Unit Rumah</label>
                            <input type="number" class="form-control" name="stok" placeholder="Tanah Tersedia" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Harga Sewa</label>
                            <input type="number" class="form-control" name="harga_sewa" placeholder="Harga Sewa" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-sm-3">
                        <label class="col-form-label">Harga Rumah</label>
                        <input type="number" class="form-control" name="harga_kamar" placeholder="Harga Kamar" required>
                    </div> -->

                    
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="col-form-label">Alamat</label>
                            <textarea name="ket_lain" class="form-control" rows="4" placeholder="Opsional"></textarea>
                        </div>
                        <div class="col-sm-4">
                            <label class=" col-form-label">Keterangan Biaya</label>
                            <textarea name="ket_biaya" class="form-control" rows="4" placeholder="Opsional"></textarea>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Deskripsi</label>
                            <textarea name="desc" class="form-control" rows="4" placeholder="Opsional"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Start Fasilitas Kamar --}}
                <span id="fkamar">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-xl-5 col-10">
                            <label class="col-form-label">Fasilitas Rumah</label>
                            <input type="text" class="form-control" name="addmore[0][name]" placeholder="Fasilitas bangunan" required>
                        </div>
                        <div class="col-2 col-lg-1 col-xl-1">
                            <label class="col-form-label">.</label>
                            <input type="button" id="addfkamar" name="addfkamar" class="form-control btn btn-success btn-sm" value="+">
                        </div>
                        </div>
                    </div>
                </span>
                {{-- End Fasilitas Kamar --}}

                {{-- Start Fasilitas Kamar Mandi --}}
                    <span id="fkm">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-5 col-xl-5 col-10">
                                    <label class="col-form-label">Fasilitas Kamar Mandi</label>
                                    <input type="text" class="form-control" name="addkm[0][name]" placeholder="Fasilitas Kama Mandi" required>
                                </div>
                                <div class="col-2 col-lg-1 col-xl-1">
                                    <label class="col-form-label">.</label>
                                    <input type="button" id="addkm" name="addkm" class="form-control btn btn-success btn-sm" value="+">
                                </div>
                            </div>
                        </div>
                    </span>
                {{-- End Fasilitas Kamar Mandi --}}

                {{-- Start Fasilitas Bersama --}}
                    <span id="fbersama">
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-lg-5 col-xl-5 col-10">
                                    <label class="col-form-label">Fasilitas Bersama</label>
                                    <input type="text" class="form-control" name="addbersama[0][name]" placeholder="Fasilitas Bersama" required>
                                </div>
                                <div class="col-2 col-lg-1 col-xl-1">
                                    <label class="col-form-label">.</label>
                                    <input type="button" id="addbersama" name="addbersama" class="form-control btn btn-success btn-sm" value="+">
                                </div>
                            </div>
                        </div>
                    </span>
                {{-- End Fasilitas Bersama --}}

                {{-- Start Fasilitas Parkir --}}
                <span id="fparkir">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-5 col-xl-5 col-10">
                                <label class="col-form-label">Fasilitas Parkir</label>
                                <input type="text" class="form-control" name="addparkir[0][name]" placeholder="Fasilitas Parkir" required>
                            </div>
                            <div class="col-2 col-lg-1 col-xl-1">
                                <label class="col-form-label">.</label>
                                <input type="button" id="addparkir" name="addparkir" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </div>
                </span>
                {{-- End Fasilitas Parkir --}}

                {{-- Start Area --}}
                <span id="farea">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-5 col-xl-5 col-10">
                                <label class="col-form-label">Area Lingkungan</label>
                                <input type="text" class="form-control" name="addarea[0][name]" placeholder="Area Lingkungan" required>
                            </div>
                            <div class="col-2 col-lg-1 col-xl-1">
                                <label class="col-form-label">.</label>
                                <input type="button" id="addarea" name="addarea" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </div>
                </span>
                {{-- End Area --}}

                {{-- Start Image --}}
                <span id="image">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-5 col-xl-5 col-10">
                                <label class="col-form-label">Foto Rumah</label>
                                <input type="file" class="form-control" name="addfoto[0][foto_kamar]" required>
                            </div>
                            <div class="col-2 col-lg-1 col-xl-1">
                                <label class="col-form-label">.</label>
                                <input type="button" id="addfoto" name="addfoto" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </div>
                </span>
                {{-- End Image --}}

                <div class="form-group row ">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="{{route('tanah.index')}}" class="btn btn-warning">Batal</a>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
  <script src="{{asset('ctrl/kamar/create.js')}}"></script>
@endsection