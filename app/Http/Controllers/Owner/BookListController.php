<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Transaction,tanah,payment,User};
use Auth;
use Session;
use Carbon\carbon;

class BookListController extends Controller
{
    //Booking List
    public function index()
    {
      if (!empty(Auth::user()->tanah->id)) {
        $booking = Transaction::where('tanah_id', Auth::user()->tanah->id)->get();
        return view('pemilik.booking.index', compact('booking'));
      } else {
        Session::flash('error','Data tanah Masih Kosong');
        return redirect('/home');
      }

    }

    // Konfirmasi Pembayaran from user
    public function confirm_payment()
    {
      $confirm = Transaction::where('tanah_id', Auth::user()->tanah->id)->where('status','Pending')->first();
      if ($confirm) {
        return view('pemilik.booking.confirm', compact('confirm'));
      }
      Session::flash('success','Payment Sudah Di Proses');
      return redirect('/pemilik/booking-list');
    }

    // Proses konfirmasi pembayaran from user
    public function proses_confirm_payment(Request $request, $id)
    {
      $confirm = Transaction::findOrFail($id);
      $confirm->status      = 'Proses';
      $confirm->updated_at  = Carbon::now();
      $confirm->save();

      if ($confirm) {
        $tanah = tanah::where('id', $confirm->tanah_id)->first();
        $tanah->sisa_tanah = $tanah->sisa_tanah - 1;
        $tanah->save();
        if ($tanah) {
          // Add credit point
          $point = User::where('id', $confirm->user_id)->firstOrFail();
          $point->credit  = $point->credit + 2;
          $point->save();
        }
      }
      Session::flash('success','Payment Sudah Di Proses');
      return redirect('/pemilik/booking-list');
    }

    // Proses konfirmasi pembayaran from user
    public function reject_confirm_payment(Request $request)
    {
      $reject = Transaction::findOrFail($request->id);
      $reject->update([
        'status'      => 'Reject',
        'updated_at'  => carbon::now()
      ]);
      Session::flash('error','Data Pembayaran Berhasil Di Reject');
      return $request;
    }

}
