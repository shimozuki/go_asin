@extends('layouts.index')
@section('title','Tambah Kamar')
@section('content')
    <div class="card">
        <div class="card-block">
                <h4 class="sub-title">Tambah Kamar</h4>
                
            <form action="{{route('kamar.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_kamar" placeholder="Nama Kamar">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kamar</label>
                    <div class="col-sm-10">
                        <select name="jenis_kamar" class="form-control">
                            <option>Putra/Putri</option>
                            <option value="Putra">Putra</option>
                            <option value="Putri">Putri</option>
                            <option value="Campur">Campur</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Luas Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="luas_kamar" placeholder="Contoh 3 x 4">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Stok Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="stok_kamar" placeholder="Kamar Tersedia">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Harga Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="harga_kamar" placeholder="Harga Kamar">
                    </div>
                </div>

                {{-- Start Fasilitas Kamar --}}
                <span id="fkamar">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Fasilitas Kamar</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="addmore[0][fkamar_name]" placeholder="Fasilitas Kamar">
                        </div>
                        <div class="col-1">
                                <input type="button" id="addfkamar" name="addfkamar" class="form-control btn btn-success btn-sm" value="+">
                        </div>
                    </div>
                </span>
                {{-- End Fasilitas Kamar --}}

                {{-- Start Fasilitas Kamar Mandi --}}
                    <span id="fkm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fasilitas Kama Mandi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="addkm[0][fkamar_mandi]" placeholder="Fasilitas Kama Mandi">
                            </div>
                            <div class="col-1">
                                <input type="button" id="addkm" name="addkm" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </span>
                {{-- End Fasilitas Kamar Mandi --}}

                {{-- Start Fasilitas Bersama --}}
                    <span id="fbersama">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fasilitas Bersama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="addbersama[0][fbersama_name]" placeholder="Fasilitas Bersama">
                            </div>
                            <div class="col-1">
                                <input type="button" id="addbersama" name="addbersama" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </span>
                {{-- End Fasilitas Bersama --}}

                {{-- Start Fasilitas Parkir --}}
                <span id="fparkir">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Fasilitas Parkir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="addparkir[0][fparkir_name]" placeholder="Fasilitas Parkir">
                        </div>
                        <div class="col-1">
                            <input type="button" id="addparkir" name="addparkir" class="form-control btn btn-success btn-sm" value="+">
                        </div>
                    </div>
                </span>
                {{-- End Fasilitas Parkir --}}
 
                {{-- Start Area --}}
                <span id="farea">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Area Lingkungan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="addarea[0][area_name]" placeholder="Area Lingkungan">
                        </div>
                        <div class="col-1">
                            <input type="button" id="addarea" name="addarea" class="form-control btn btn-success btn-sm" value="+">
                        </div>
                    </div>
                </span>
                {{-- End Area --}}

                <div class="form-group row">
                    <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Tambah Kamar</button>
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

            $("#fkamar").append('<div class="form-group row remove"><label class="col-sm-2 col-form-label"></label><div class="col-sm-9"><input type="text" class="form-control" name="addmore['+i+'][fkamar_name]" placeholder="Fasilitas Kamar"></div><div class="col-1"> <input type="button" class="form-control btn btn-danger btn-sm remove-fk" value="-"></div></div>');
        });

        $(document).on('click', '.remove-fk', function(){  
                $(this).parents('.remove').remove();
        });

        // Tambah Fasilitas Kamar Mandi
        var km = 0;
        $("#addkm").click(function(){
            ++km;

            $("#fkm").append('<div class="form-group row remove"><label class="col-sm-2 col-form-label"></label><div class="col-sm-9"><input type="text" class="form-control" name="addkm['+km+'][fkamar_mandi]" placeholder="Fasilitas Kamar Mandi"></div><div class="col-1"> <input type="button" class="form-control btn btn-danger btn-sm remove-km" value="-"></div></div>');
        });

        $(document).on('click', '.remove-km', function(){  
                $(this).parents('.remove').remove();
        });

        // Tambah Fasilitas Bersama
        var bersama = 0;
        $("#addbersama").click(function(){
            ++bersama;

            $("#fbersama").append('<div class="form-group row remove"><label class="col-sm-2 col-form-label"></label><div class="col-sm-9"><input type="text" class="form-control" name="addbersama['+bersama+'][fbersama_name]" placeholder="Fasilitas Bersama"></div><div class="col-1"> <input type="button" class="form-control btn btn-danger btn-sm remove-bersama" value="-"></div></div>');
        });

        $(document).on('click', '.remove-bersama', function(){  
                $(this).parents('.remove').remove();
        });

        // Tambah Fasilitas Parkir
        var parkir = 0;
        $("#addparkir").click(function(){
            ++parkir;

            $("#fparkir").append('<div class="form-group row remove"><label class="col-sm-2 col-form-label"></label><div class="col-sm-9"><input type="text" class="form-control" name="addparkir['+parkir+'][fparkir_name]" placeholder="Fasilitas Prkir"></div><div class="col-1"> <input type="button" class="form-control btn btn-danger btn-sm remove-parkir" value="-"></div></div>');
        });

        $(document).on('click', '.remove-parkir', function(){  
                $(this).parents('.remove').remove();
        });

        // Tambah Fasilitas Lingkungan
        var area = 0;
        $("#addarea").click(function(){
            ++area;

            $("#farea").append('<div class="form-group row remove"><label class="col-sm-2 col-form-label"></label><div class="col-sm-9"><input type="text" class="form-control" name="addarea['+area+'][area_name]" placeholder="Fasilitas Lingkungan"></div><div class="col-1"> <input type="button" class="form-control btn btn-danger btn-sm remove-area" value="-"></div></div>');
        });

        $(document).on('click', '.remove-area', function(){  
                $(this).parents('.remove').remove();
        });
    </script>
@endsection