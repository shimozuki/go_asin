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
        $kos = kamar::limit(6)->orderBy('id','DESC')->get();
        return view('frontend.home', compact("kos"));
    }

    // Detail Kos
    public function detailkos($id)
    {
        $auth = @auth::user()->id;
        $detail = kamar::SelectRaw('kamars.*,a.user_id,a.kamar_id,a.status,b.role')
        ->leftJoin('sewas as a','a.kamar_id', '=','kamars.id')
        ->leftJoin('users as b','b.id','=','kamars.id_user')
        ->groupBy('a.kamar_id')
        ->where('kamars.id',$id)
        ->get();
        return view('frontend.detail.index',compact('detail','sewa','cek','auth'));
    }
}
