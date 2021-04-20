<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Transaction,kamar,payment,User};
use Auth;
use Session;
use Carbon\carbon;

class BookListController extends Controller
{
    //Booking List
    public function index()
    {
      if (!empty(Auth::user()->kamar->id)) {
        $booking = Transaction::where('kamar_id', Auth::user()->kamar->id)->get();
        return view('pemilik.booking.index', compact('booking'));
      } else {
        Session::flash('error','Data Kamar Masih Kosong');
        return redirect('/home');
      }

    }

    // Konfirmasi Pembayaran from user
    public function confirm_payment()
    {
      $confirm = Transaction::where('kamar_id', Auth::user()->kamar->id)->where('status','Pending')->first();
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
        $kamar = kamar::where('id', $confirm->kamar_id)->first();
        $kamar->sisa_kamar = $kamar->sisa_kamar - 1;
        $kamar->save();
        if ($kamar) {
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
