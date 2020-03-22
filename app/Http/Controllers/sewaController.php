<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kamar;
use App\profil;
use App\sewa;
use Auth;

class sewaController extends Controller
{
    // Index Sewa Kamar
    public function index($id)
    {
       if (auth::check()) {
           if (auth::user()->role == "User") {
                $cek = sewa::where('user_id',auth::user()->id)->first();
                $sewa = kamar::selectRaw('kamars.*,a.nama_bank,a.no_rek')
                ->leftJoin('users as a','a.id','=','kamars.id_user')
                ->where('kamars.id',$id)->get();
                if (@$cek->user_id == null) {
                    return view('sewa.index', compact('sewa','cek'));
                } elseif(auth::user()->role == "User") {
                    return redirect()->back();
                } else {
                    return redirect('dashboard');
                }
           }
       }
    }

    // Proses Sewa
    public function store(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "User") {
                $sewa = new sewa;
                $sewa->user_id = auth::user()->id;
                $sewa->kamar_id = $request->kamar_id;
                $sewa->lama_sewa = $request->lama_sewa;
                $sewa->pemilik_id = $request->pemilik_id;
                $sewa->status = 'Menunggu Pembayaran';
                $sewa->stok_id = 1;
                $sewa->notes = $request->notes;
                $sewa->save();
                return redirect('my-room');
            }
        } else {
            return redirect('dashboard');
        }
    }
}
