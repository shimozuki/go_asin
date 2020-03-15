<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use App\sewa;
use auth;

class FrontendController extends Controller
{
    // Card Kos
    public function cardkos()
    {
        $id = sewa::first();
        $idk = kamar::first();
        $cek = sewa::where('status','Lunas')->where('kamar_id', $idk->id)->get();
        $kos = kamar::all();
        return view('welcome', compact("kos","cek"));
    }

    // Detail Kos
    public function detailkos($id)
    {

        $sewa = sewa::where('status','Lunas')->where('kamar_id',$id)->get();
        $ids = sewa::first();
        $cek = sewa::where('status','Lunas')->where('kamar_id',$id)->get();
        $auth = @auth::user()->id;
        $detail = kamar::SelectRaw('kamars.*,a.user_id,a.kamar_id,a.status,b.role')
        ->leftJoin('sewas as a','a.kamar_id', '=','kamars.id')
        ->leftJoin('users as b','b.id','=','kamars.id_user')
        ->groupBy('a.kamar_id')
        ->where('kamars.id',$id)
        ->get();
        return view('detail', compact('detail','sewa','cek','auth'));
    }
}
