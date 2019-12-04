<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;

class FrontendController extends Controller
{
    // Card Kos
    public function cardkos()
    {
        $kos = kamar::get();
        return view('welcome', compact("kos"));
    }

    // Detail Kos
    public function detailkos($id)
    {
        $detail = Kamar::selectRaw('Kamars.*,a.fkamar_name,b.fkamar_mandi,c.fparkir_name,d.area_name,e.fbersama_name')
        ->leftJoin('fkamars as a','a.id_kamar','=','Kamars.id')
        ->leftJoin('fkamar_mandis as b','b.idkamar_mandi','=','Kamars.id')
        ->leftJoin('fparkirs as c','c.idfparkir','=','Kamars.id')
        ->leftJoin('areas as d','d.idarea','=','Kamars.id')
        ->leftJoin('fbersamas as e','e.idfbersama','=','Kamars.id')
        ->find($id);
        return view('detail', compact('detail'));
    }
}
