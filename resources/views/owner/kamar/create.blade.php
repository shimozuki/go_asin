@extends('layouts.backend')
@section('title','Tambah Kosan')
@section('content')
    <div class="card">
        <div class="card-block">
                <h4 class="sub-title">Tambah Kosan</h4>
                
            <form action="{{route('kamar.store')}}" method="POST">
                @csrf
                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="col-form-label">Nama Kamar</label>
                            <input type="text" class="form-control" name="nama_kamar" placeholder="Nama Kamar">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Jenis Kama</label>
                            <select name="jenis_kamar" class="form-control">
                                <option value="">--Putra/Putri--</option>
                                <option value="Putra">Putra</option>
                                <option value="Putri">Putri</option>
                                <option value="Campur">Campur</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="col-form-label">Luas Kamar</label>
                            <input type="text" class="form-control" name="luas_kamar" placeholder="Contoh 3 x 4">
                        </div>
                        <div class="col-sm-4">
                            <label class=" col-form-label">Stok Kamar</label>
                            <input type="text" class="form-control" name="stok_kamar" placeholder="Kamar Tersedia">
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Harga Kamar</label>
                            <input type="text" class="form-control" name="harga_kamar" placeholder="Harga Kamar">
                        </div>
                    </div>
                </div>

                {{-- Start Fasilitas Kamar --}}
                <span id="fkamar">
                    <div class="form-group">
                       <div class="row">
                           <div class="col-lg-5 col-xl-5 col-10">
                            <label class="col-form-label">Fasilitas Kamar</label>
                            <input type="text" class="form-control" name="addmore[0][fkamar_name]" placeholder="Fasilitas Kamar">
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
                                    <label class="col-form-label">Fasilitas Kama Mandi</label>
                                    <input type="text" class="form-control" name="addkm[0][fkamar_mandi]" placeholder="Fasilitas Kama Mandi">
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
                                    <input type="text" class="form-control" name="addbersama[0][fbersama_name]" placeholder="Fasilitas Bersama">
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
                                <input type="text" class="form-control" name="addparkir[0][fparkir_name]" placeholder="Fasilitas Parkir">
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
                                <input type="text" class="form-control" name="addarea[0][area_name]" placeholder="Area Lingkungan">
                            </div>
                            <div class="col-2 col-lg-1 col-xl-1">
                                <label class="col-form-label">.</label>
                                <input type="button" id="addarea" name="addarea" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </div>
                </span>
                {{-- End Area --}}

                <div class="form-group row ">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Kosan</button>
                        <a href="{{route('kamar.index')}}" class="btn btn-warning">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        // Tambah Fasilitas Kamar
        var i = 0;
        $("#addfkamar").click(function(){
            ++i;

            $("#fkamar").append('<div class="form-group remove"><div class="row"><div class="col-lg-5 col-xl-5 col-10"><label class="col-form-label" style="color:red">Fasilitas Kamar</label><input type="text" class="form-control" name="addmore['+i+'][fkamar_name]" placeholder="Tambah Fasilitas Kamar"></div><div class="col-2 col-lg-1 col-xl-1"> <label class="col-form-label">.</label><input type="button" class="form-control btn btn-danger btn-sm remove-fk" value="-"></div></div></div>');
        });

        $(document).on('click', '.remove-fk', function(){  
                $(this).parents('.remove').remove();
        });

        // Tambah Fasilitas Kamar Mandi
        var km = 0;
        $("#addkm").click(function(){
            ++km;

            $("#fkm").append('<div class="form-group remove"> <div class="row"><div class="col-lg-5 col-xl-5 col-10"><label class="col-form-label" style="color:red">Fasilitas Kama Mandi</label><input type="text" class="form-control" name="addkm['+km+'][fkamar_mandi]" placeholder="Tambah Fasilitas Kama Mandi"></div><div class="col-2 col-lg-1 col-xl-1"><label class="col-form-label">.</label><input type="button" id="addkm" name="addkm" class="form-control btn btn-danger btn-sm remove-km" value="-"></div></div></div>');
        });

        $(document).on('click', '.remove-km', function(){  
                $(this).parents('.remove').remove();
        });

        // Tambah Fasilitas Bersama
        var addbersama = 0;
        $("#addbersama").click(function(){
            ++addbersama;

            $("#fbersama").append('<div class="form-group remove"><div class="row"><div class="col-lg-5 col-xl-5 col-10"><label class="col-form-label" style="color:red">Fasilitas Bersama</label><input type="text" class="form-control" name="addbersama['+addbersama+'][fbersama_name]" placeholder="Tambah Fasilitas Bersama"></div><div class="col-2 col-lg-1 col-xl-1"><label class="col-form-label">.</label><input type="button" class="form-control btn btn-danger btn-sm remove-bersama" value="-"></div></div></div>');
        });

        $(document).on('click', '.remove-bersama', function(){  
                $(this).parents('.remove').remove();
        });

        // Tambah Fasilitas Parkir
        var addparkir = 0;
        $("#addparkir").click(function(){
            ++addparkir;

            $("#fparkir").append('<div class="form-group remove"><div class="row"><div class="col-lg-5 col-xl-5 col-10"><label class="col-form-label" style="color:red">Fasilitas Parkir</label><input type="text" class="form-control" name="addparkir['+addparkir+'][fparkir_name]" placeholder="Tambah Fasilitas Parkir"></div><div class="col-2 col-lg-1 col-xl-1"><label class="col-form-label">.</label><input type="button" id="addparkir" name="addparkir" class="form-control btn btn-danger btn-sm remove-parkir" value="-"> </div></div></div>');
        });

        $(document).on('click', '.remove-parkir', function(){  
                $(this).parents('.remove').remove();
        });

        // Tambah Fasilitas Lingkungan
        var area = 0;
        $("#addarea").click(function(){
            ++area;

            $("#farea").append('<div class="form-group remove"><div class="row"><div class="col-sm-5"><label class="col-form-label">Area Lingkungan</label><input type="text" class="form-control" name="addarea['+area+'][area_name]" placeholder="Area Lingkungan"></div><div class="col-2 col-lg-1 col-xl-1"> <label class="col-form-label">.</label><input type="button" class="form-control btn btn-danger btn-sm remove-area" value="-"></div></div></div>');
        });

        $(document).on('click', '.remove-area', function(){  
                $(this).parents('.remove').remove();
        });
    </script>
@endsection