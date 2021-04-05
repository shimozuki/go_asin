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

        return view('pemilik.penghuni.index', compact('penghuni'));
      } else {
        Session::flash('error','Data Kamar Masih Kosong');
        return redirect('/home');
      }

    }
}
