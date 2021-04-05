<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Transaction};
use Auth;
use Session;
use Carbon\Carbon;

class PenghuniController extends Controller
{
    //Penghuni
    public function penghuni()
    {
      if (!empty(Auth::user()->kamar->user_id)) {
        $penghuni = Transaction::where('status','Proses')->where('pemilik_id', Auth::user()->kamar->user_id)->get();

        $sisa = [];
        foreach ($penghuni as $item) {
          $date = $item->tgl_sewa;
          $datenow = carbon::now();
          $now = carbon::parse($date)->diffInDays($datenow);
          $nows = ($item->lama_sewa * 30);
          $sisa = $nows - $now;
        }

        return view('pemilik.penghuni.index', compact('penghuni','sisa'));
      } else {
        Session::flash('error','Data Kamar Masih Kosong');
        return redirect('/home');
      }

    }
}
