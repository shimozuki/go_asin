<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Transaction};
use Auth;

class PenghuniController extends Controller
{
    //Penghuni
    public function penghuni()
    {
      $penghuni = Transaction::where('status','Proses')->where('kamar_id', Auth::user()->kamar->user_id)->get();
      return view('pemilik.penghuni.index', compact('penghuni'));
    }
}
