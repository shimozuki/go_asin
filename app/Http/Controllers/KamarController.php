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
                $cek = kamar::where('id_user',auth::user()->id)->first();
                $sisa = sewa::where('kamar_id', @$cek->id)->where('status','Lunas')->get();
                $kamar = kamar::where('id_user',auth::user()->id)->get();
                return view('owner.kamar.index', compact('kamar','sisa'));
            }
       } else {
           return redirect('home');
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
                return view('owner.kamar.create');
            }
        } else {
            return redirect('home');
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
                $kamar = new Kamar;
                $kamar->id = $request->id;
                $kamar->id_user = auth::user()->id;
                $kamar->nama_kamar = $request->nama_kamar;
                $kamar->jenis_kamar = $request->jenis_kamar;
                $kamar->luas_kamar = $request->luas_kamar;
                $kamar->stok_kamar = $request->stok_kamar;
                $kamar->harga_kamar = $request->harga_kamar;
                $kamar->save();

                foreach($request->addmore as $value){
                    $fkamar = new fkamar;
                    $fkamar->id_kamar = $kamar->id;
                    $fkamar->fkamar_name = $value['fkamar_name'];
                    $fkamar->save();
                }

                foreach ($request->addkm as $value) {
                    $fkamar_mandi = new fkamar_mandi;
                    $fkamar_mandi->idkamar_mandi = $kamar->id;
                    $fkamar_mandi->fkamar_mandi = $value['fkamar_mandi'];
                    $fkamar_mandi->save();
                }

                foreach ($request->addbersama as $value) {
                    $fbersama = new fbersama;
                    $fbersama->idfbersama = $kamar->id;
                    $fbersama->fbersama_name = $value['fbersama_name'];
                    $fbersama->save();
                }

                foreach ($request->addparkir as $value) {
                    $fparkir = new fparkir;
                    $fparkir->idfparkir = $kamar->id;
                    $fparkir->fparkir_name = $value['fparkir_name'];
                    $fparkir->Save();
                }

                foreach ($request->addarea as $value) {
                    $area = new area;
                    $area->idarea =  $kamar->id;
                    $area->area_name = $value['area_name'];
                    $area->save();
                }

                return redirect()->route('kamar.index');
            }
        } else {
            return redirect('home');
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
        //
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
}
