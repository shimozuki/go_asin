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
        $cek = sewa::where('status','Lunas')->find($id);
        $kos = kamar::where('id',$id->kamar_id)->get();
        return view('welcome', compact("kos","cek"));
    }

    // Detail Kos
    public function detailkos($id)
    {
        $sewa = sewa::where('status','Lunas')->where('kamar_id',$id)->get();
        $ids = sewa::first();
        $cek = sewa::where('status','Lunas')->find($ids);
        $auth = @auth::user()->id;
        $detail = kamar::SelectRaw('kamars.*,a.user_id,a.kamar_id,a.status')
        ->leftJoin('sewas as a','a.kamar_id', '=','kamars.id')
        ->groupBy('a.kamar_id')
        ->get();
        return view('detail', compact('detail','sewa','cek','auth'));
    }
}
