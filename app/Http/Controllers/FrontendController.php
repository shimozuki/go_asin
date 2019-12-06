<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;

class FrontendController extends Controller
{
    // Card Kos
    public function cardkos()
    {
        $kos = kamar::all();
        return view('welcome', compact("kos"));
    }

    // Detail Kos
    public function detailkos($id)
    {
        $detail = Kamar::selectRaw('kamars.*,a.user_id')
        ->leftJoin('sewas as a','a.kamar_id','=','kamars.id')
        ->where('kamars.id',$id)->get();
        return view('detail', compact('detail'));
    }
}
