<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use App\Profil;
use App\Sewa;
use Auth;

class sewaController extends Controller
{

    // Index Sewa Kamar
    public function index($id)
    {
        $sewa = Kamar::selectRaw('kamars.*,a.nama_bank,a.no_rek')
        ->leftJoin('profils as a','a.user_id','=','kamars.id_user')
        ->where('kamars.id',$id)->get();
        return view('sewa.index', compact('sewa'));
    }

    // Proses Sewa
    public function store(Request $request)
    {
        if (auth::user()->role == "User") {
            $sewa = new sewa;
            $sewa->user_id = auth::user()->id;
            $sewa->kamar_id = $request->kamar_id;
            $sewa->lama_sewa = $request->lama_sewa;
            $sewa->status = 'Menunggu Pembayaran';
            $sewa->save();

            return redirect('home');
        }
    }
}
