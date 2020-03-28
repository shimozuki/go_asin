<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kamar;
use App\fkamar;
use App\fkamar_mandi;
use App\fbersama;
use App\fparkir;
use App\area;
use App\sewa;
use App\fotokamar;
use App\provinsi;
use Auth;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (auth::check()) {
            if (auth::user()->role == "Owner") {
                $kamar = kamar::where('id_user',auth::user()->id)->get();
                return view('owner.kamar.index', compact('kamar'));
            }
       } else {
           return redirect('dashboard');
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth::check()) {
            if (auth::user()->role == "Owner") {
                if (auth::user()->nama_bank == '' or auth::user()->no_rek == '' or auth::user()->no_telp == '') {
                    return redirect('owner/'. auth::user()->id.'/edit');
                } else {
                    $provinsi = provinsi::select('kode','nama')->get();
                    return view('owner.kamar.create', compact('provinsi'));
                }
                
            }
        } else {
            return redirect('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth::check()) {

            if (auth::user()->role == "Owner") {

                $foto = $request->file('bg_foto');
                $nama_foto = time()."_".$foto->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'bg_foto';
                $foto->move($tujuan_upload,$nama_foto);

                $kamar = new Kamar;
                $kamar->id = $request->id;
                $kamar->id_user = auth::user()->id;
                $kamar->nama_kamar = $request->nama_kamar;
                $kamar->jenis_kamar = $request->jenis_kamar;
                $kamar->luas_kamar = $request->luas_kamar;
                $kamar->stok_kamar = $request->stok_kamar;
                $kamar->sisa_kamar = $kamar->stok_kamar;
                $kamar->harga_kamar = $request->harga_kamar;
                $kamar->ket_lain = $request->ket_lain;
                $kamar->ket_biaya = $request->ket_biaya;
                $kamar->desc = $request->desc;
                $kamar->kategori = $request->kategori;
                $kamar->book = $request->book;
                $kamar->bg_foto = $nama_foto;
                $kamar->provinsi_id = $request->provinsi_id;
                $kamar->provinsi_nama = $request->provinsi_nama;
                $kamar->save();

                if ($kamar->save()) {
                    foreach($request->addmore as $value){
                        $fkamar = new fkamar;
                        $fkamar->id_kamar = $kamar->id;
                        $fkamar->fkamar_name = $value['fkamar_name'];
                        $fkamar->save();
                    }
                }

                if ($kamar->save() && $fkamar->save()) {
                    foreach ($request->addkm as $value) {
                        $fkamar_mandi = new fkamar_mandi;
                        $fkamar_mandi->idkamar_mandi = $kamar->id;
                        $fkamar_mandi->fkamar_mandi = $value['fkamar_mandi'];
                        $fkamar_mandi->save();
                    }
                }

                if ($kamar->save() && $fkamar->save() && $fkamar_mandi->save()) {
                    foreach ($request->addbersama as $value) {
                        $fbersama = new fbersama;
                        $fbersama->idfbersama = $kamar->id;
                        $fbersama->fbersama_name = $value['fbersama_name'];
                        $fbersama->save();
                    }
                }

                if ($kamar->save() && $fkamar->save() && $fkamar_mandi->save() && $fbersama->save()) {
                    foreach ($request->addparkir as $value) {
                        $fparkir = new fparkir;
                        $fparkir->idfparkir = $kamar->id;
                        $fparkir->fparkir_name = $value['fparkir_name'];
                        $fparkir->save();
                    }
                }

                if ($kamar->save() && $fkamar->save() && $fkamar_mandi->save() && $fbersama->save() && $fparkir->save()) {
                    foreach ($request->addarea as $value) {
                        $area = new area;
                        $area->idarea =  $kamar->id;
                        $area->area_name = $value['area_name'];
                        $area->save();
                    }
                }

                if ($kamar->save() && $fkamar->save() && $fkamar_mandi->save() && $fbersama->save() && $fparkir->save() && $area->save()) {
                    foreach($request->addfoto as $value) {

                        $foto_kamar = $value['foto_kamar'];
                        $nama_foto = time()."_".$foto_kamar->getClientOriginalName();
                        // isi dengan nama folder tempat kemana file diupload
                        $tujuan_upload = 'foto_kamar';
                        $foto_kamar->move($tujuan_upload,$nama_foto);

                        $foto = new fotokamar;
                        $foto->idfoto = $kamar->id;
                        $foto->foto_kamar = $nama_foto;
                        $foto->save();
                    }
                }

                return redirect()->route('kamar.index');
            }
        } else {
            return redirect('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth::check()) {
            if (auth::user()->role == "Owner") {
                $show = kamar::where('id', $id)->get();
                return view('owner.kamar.show', compact('show'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // Get Nama Provinsi
    public function namaProvinsi(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "Owner") {
                $provinsi = provinsi::select('kode','nama')
                ->where('kode',$request->kode)
                ->get();

                $select = '';
                $select .= '
                        <div class="form-group has-success" hidden>
                        <select class="form-control" name="provinsi_nama">
                        ';
                        foreach ($provinsi as $item) {
                $select .= '<option value="'.$item->nama.'">'.$item->nama.'</option>';
                            }'
                            </select>
                            </div>';
                return $select;
            }
        }
    }
}
