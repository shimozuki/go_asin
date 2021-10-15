<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Transaction,tanah,payment,User};
use Auth;
use Str;
use Session;
use Carbon\carbon;

class TransactionController extends Controller
{
    // Tagihan
    public function tagihan()
    {
      if (Auth::check()) {
        if (Auth::user()->role == 'Pencari') {
          $tagihan = Transaction::where('user_id', Auth::id())->get();
          return view('user.payment.index', compact('tagihan'));
        }
      }
    }

    // Transaction Sewa tanah
    public function store(Request $request, $id)
    {

      if (Auth::check()) {
        if (Auth::user()->role == 'Pencari') {
          $request->validate([
            'tgl_sewa'  => 'required'
          ]);

          $room = tanah::where('id', $id)->first(); // Get Room by id

          $iduser = Auth::id(); // Get ID User
          $number = mt_rand(100, 999); // Get Random Number
          $date = date('dmy'); // Get Date Now
          $key = Str::random(9999);

          $tanah = new Transaction;
          $tanah->key                 = 'confirm-payment-' .$key;
          $tanah->transaction_number  = 'BOOK-' .$number .$id .'-' .$date;
          $tanah->tanah_id            = $id;
          $tanah->user_id             = Auth::id();
          $tanah->pemilik_id          = $room->user_id;
          $tanah->lama_sewa           = $request->lama_sewa;
          if ($request->lama_sewa == 1) {
            $tanah->hari              = 30;
          } elseif($request->lama_sewa == 3) {
            $tanah->hari              = 90;
          } elseif($request->lama_sewa == 6) {
            $tanah->hari              = 180;
          } elseif ($request->lama_sewa == 12) {
            $tanah->hari              = 360;
          }

          $points = calculatePointUser(Auth::id());

          $tanah->harga_sewa         = $room->harga_sewa;
          if ($request->credit) {
            $totalharga               = $room->harga_sewa * $request->lama_sewa + $number;
            $tanah->harga_total       = $totalharga - $points;
          } else {
            $tanah->harga_total       = $room->harga_sewa * $request->lama_sewa + $number;
          }

          $tanah->tgl_sewa            = Carbon::parse($request->tgl_sewa)->format('d-m-Y');
          $tanah->end_date_sewa       = Carbon::parse($request->tgl_sewa)->addDays($tanah->hari)->format('d-m-Y');
          $tanah->save();

          // jika sukses Simpan ke table payment
          if ($tanah) {
            $payment = new payment;
            $payment->transaction_id    = $tanah->id;
            $payment->user_id           = Auth::id();
            $payment->tanah_id          = $id;
            $payment->save();
          }

          if ($tanah = $request->credit) {
            $point = User::where('id', Auth::id())->firstOrFail();
            $credit = $point->credit - $point->credit;
            $point->credit = $credit;
            $point->save();
          }

          Session::flash('success','Berhasil, Silahkan Melakukan Pembayaran');
          return redirect('/home');
        } else {
          abort(403);
        }
      }

    }

    // Detail Pembayaran
    public function detail_payment($key)
    {
      $transaksi = Transaction::where('key',$key)->first();
      if ($transaksi->payment->status == 'Pending') {
        return view('user.payment.show', compact('transaksi'));
      } else {
        Session::flash('error','Pembayaran Sudah Terkirim');
        return redirect('/user/tagihan');
      }
    }

    // Transaction pembayaran room
    public function update(Request $request, $id)
    {
      $konfirmasi = Transaction::findOrFail($id);
      $konfirmasi->status = 'Pending';
      $konfirmasi->save();


      $bukti = $request->file('bukti');
      $nama_bukti = time()."_".$bukti->getClientOriginalName();
      // isi dengan nama folder tempat kemana file diupload
      $tujuan_upload = 'bukti';
      $bukti->move($tujuan_upload,$nama_bukti);
      
      if ($konfirmasi) {

        $payment = payment::where('transaction_id',$id)->first();
        $payment->type_transfer     = 'BANK';
        $payment->nama_bank         = $request->nama_bank;
        $payment->nama_pemilik      = $request->nama_pemilik;
        $payment->bank_tujuan       = $request->bank_tujuan;
        $payment->status            = 'Success';
        $payment->jumlah_bayar      = $request->jumlah_bayar;
        $payment->tgl_transfer      = $request->tgl_transfer;
        $payment->bukti             = $nama_bukti;
        $payment->save();
      }

      Session::flash('success','Pembayaran Terkirim');
      return redirect('/user/tagihan');
    }
}
