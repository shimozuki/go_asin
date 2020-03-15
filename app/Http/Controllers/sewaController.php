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
        $sewa = Kamar::all();
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
            $sewa->stok_id = 1;
            $sewa->notes = $request->notes;
            $sewa->save();

            return redirect('home');
        }
    }
}
