<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use App\sewa;
use App\fotokamar;
use auth;

class FrontendController extends Controller
{
    // Card Kos
    public function cardkos()
    {
        $kos = kamar::orderBy('id','DESC')->paginate(6);
        return view('frontend.home', compact("kos"));
    }

    // Detail Koskamar
    public function detailkos($id)
    {
        $auth = @auth::user()->id;
        $detail = kamar::SelectRaw('kamars.*,a.user_id,a.kamar_id,a.status,b.role')
        ->leftJoin('sewas as a','a.kamar_id', '=','kamars.id')
        ->leftJoin('users as b','b.id','=','kamars.id_user')
        ->groupBy('a.kamar_id')
        ->where('kamars.id',$id)
        ->get();

        $foto = kamar::selectRaw('kamars.*,a.foto_kamar,a.id,a.idfoto')
        ->leftJoin('fotokamars as a','a.idfoto','=','kamars.id')
        ->where('kamars.id',$id)
        ->get();

        $loop = kamar::selectRaw('kamars.*,a.foto_kamar,a.id,a.idfoto')
        ->leftJoin('fotokamars as a','a.idfoto','=','kamars.id')
        ->where('kamars.id',$id)
        ->first();

        return view('frontend.detail.index',compact('detail','auth','loop','foto'));
    }
    
}
