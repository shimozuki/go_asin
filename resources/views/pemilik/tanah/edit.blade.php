@extends('layouts.backend.app')
@section('title','Edit Data Kosan')
@section('content')
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form action="{{route('tanah.update', $edit->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body ">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="col-form-label">Nama Perumahan</label>
                            <input type="text" class="form-control" name="nama" value="{{$edit->nama}}" placeholder="Nama Kamar" autocomplete="off">
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Kategori Rumah</label>
                            <select name="kategori" class="form-control">
                                <option value="">--Kategori Rumah--</option>
                                <option value="tanah kosong" {{$edit->kategori == 'tanah kosong' ? 'selected' : ''}} >Tanah Kosng</option>
                                <option value="tanah dan bangunan" {{$edit->kategori == 'tanah dan bangunan' ? 'selected' : ''}}>Tanah & Bangunan</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Harga Sewa</label>
                            <input type="number" class="form-control" name="harga_sewa" value="{{$edit->harga_sewa}}" placeholder="Harga Sewa">
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="col-form-label">Status Booking</label>
                            <select name="book" class="form-control">
                                <option value="">-- Aktif/Non-aktif --</option>
                                <option value="1" {{$edit->book == '1' ? 'selected' : ''}}>Aktif</option>
                                <option value="0" {{$edit->book == '0' ? 'selected' : ''}}>Tidak</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Luas Bangunan</label>
                            <input type="text" class="form-control" name="luas" value="{{$edit->luas}}" placeholder="Contoh 3 x 4">
                        </div>
                        <div class="col-sm-3">
                            <label class=" col-form-label">Unit Rumah</label>
                            <input type="number" class="form-control" name="stok" value="{{$edit->stok}}" placeholder="Tanah Tersedia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label class="col-form-label">Kecamatan</label>
                        <select name="provinsi_id" class="form-control" id="select2">
                            <option value="">-- Pilih Provinsi --</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{$item->kode}}" {{$edit->provinsi_id == $item->kode ? 'selected' : ''}} >{{$item->nama}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="col-form-label">Background Foto Rumah</label>
                        <input type="file" name="bg_foto" class="form-control">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="col-form-label">Alamat</label>
                            <textarea name="ket_lain" class="form-control" rows="4" placeholder="Opsional">{{$edit->ket_lain}}</textarea>
                        </div>
                        <div class="col-sm-4">
                            <label class=" col-form-label">Keterangan Biaya</label>
                            <textarea name="ket_biaya" class="form-control" rows="4" placeholder="Opsional">{{$edit->ket_biaya}}</textarea>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Deskripsi</label>
                            <textarea name="desc" class="form-control" rows="4" placeholder="Opsional">{{$edit->desc}}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Start Fasilitas Kamar --}}
                <span id="fkamar">
                    <div class="form-group">
                        <div class="row">
                          @foreach ($edit->fbangunan as $fbangunan)
                            <div class="col-lg-5 col-xl-5 col-10">
                              <label class="col-form-label">Fasilitas bangunana</label>
                              <input type="text" class="form-control" value="{{$fbangunan->name}}" placeholder="Fasilitas bangunana">
                            </div>
                          @endforeach
                        <div class="col-2 col-lg-1 col-xl-1">
                            <input type="button" id="addfbangunana" name="addfbangunana" class="form-control btn btn-success btn-sm mt-3" value="+">
                        </div>
                        </div>
                    </div>
                </span>
                {{-- End Fasilitas Kamar --}}
                <hr>
                {{-- Start Fasilitas Kamar Mandi --}}
                <span id="fkm">
                    <div class="form-group">
                        <div class="row">
                            @foreach ($edit->kmandi as $kamandis)
                              <div class="col-lg-5 col-xl-5 col-10">
                                <label class="col-form-label">Fasilitas Kama Mandi</label>
                                <input type="text" class="form-control" value="{{$kamandis->name}}" placeholder="Fasilitas Kama Mandi">
                              </div>
                            @endforeach
                            <div class="col-2 col-lg-1 col-xl-1">
                                <input type="button" id="addkm" name="addkm" class="form-control btn btn-success btn-sm mt-3" value="+">
                            </div>
                        </div>
                    </div>
                </span>
                {{-- End Fasilitas Kamar Mandi --}}
                <hr>
                {{-- Start Fasilitas Bersama --}}
                    <span id="fbersama">
                        <div class="form-group ">
                            <div class="row">
                                @foreach ($edit->fbersama as $fbersamas)
                                  <div class="col-lg-5 col-xl-5 col-10">
                                    <label class="col-form-label">Fasilitas Bersama</label>
                                    <input type="text" class="form-control" value="{{$fbersamas->name}}" placeholder="Fasilitas Bersama">
                                  </div>
                                @endforeach
                                <div class="col-2 col-lg-1 col-xl-1">
                                    <input type="button" id="addbersama" name="addbersama" class="form-control btn btn-success btn-sm mt-3" value="+">
                                </div>
                            </div>
                        </div>
                    </span>
                {{-- End Fasilitas Bersama --}}
                  <hr>
                {{-- Start Fasilitas Parkir --}}
                <span id="fparkir">
                  <div class="form-group ">
                      <div class="row">
                          @foreach ($edit->fparkir as $parkir)
                            <div class="col-lg-5 col-xl-5 col-10">
                              <label class="col-form-label">Fasilitas Parkir</label>
                              <input type="text" class="form-control" value="{{$parkir->name}}" placeholder="Fasilitas Parkir">
                            </div>
                          @endforeach
                          <div class="col-2 col-lg-1 col-xl-1">
                              <input type="button" id="addparkir" name="addparkir" class="form-control btn btn-success btn-sm mt-3" value="+">
                          </div>
                      </div>
                  </div>
                </span>
                {{-- End Fasilitas Parkir --}}
                <hr>
                {{-- Start Area --}}
                <span id="farea">
                  <div class="form-group ">
                      <div class="row">
                          @foreach ($edit->area as $area)
                            <div class="col-lg-5 col-xl-5 col-10">
                              <label class="col-form-label">Area Lingkungan</label>
                              <input type="text" class="form-control" value="{{$area->name}}" placeholder="Area Lingkungan">
                            </div>
                          @endforeach
                          <div class="col-2 col-lg-1 col-xl-1">
                              <input type="button" id="addarea" name="addarea" class="form-control btn btn-success btn-sm mt-3" value="+">
                          </div>
                      </div>
                  </div>
                </span>
                {{-- End Area --}}
                <div class="form-group row ">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
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
  <script src="{{asset('ctrl/tanah/create.js')}}"></script>
@endsection