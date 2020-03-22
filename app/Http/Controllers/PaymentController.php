<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\sewa;
use Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth::check()) {
            if (auth::user()->role == "User") {
                return view('user.payment.create');
            }
        } else{
            return redirect('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buat($id)
    {
        if (auth::check()) {
            if (auth::user()->role == "User") {
                $cek = sewa::where('user_id',auth::user()->id)->first();
                if ($cek->status == "Menunggu Pembayaran") {
                    return view('user.payment.create', compact('cek'));
                } else  {
                    return redirect('payment');
                }
            }
        } else{
            return redirect('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (auth::check()) {
            if (auth::user()->role == "User") {
                $sewa = sewa::where('user_id', auth::user()->id)->where('status','Menunggu Pembayaran')->first();

                $files = $request->file('bukti_pembayaran');
                $nama_files = time()."_".$files->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'bukti_bayar';
                $files->move($tujuan_upload,$nama_files);

                $payment = new payment();
                $payment->sewa_id = $sewa->id;
                $payment->penyewa_id = auth::user()->id;
                $payment->nama_pengirim = $request->nama_pengirim;
                $payment->no_rek_pengirim = $request->no_rek_pengirim;
                $payment->nama_bank = $request->nama_bank;
                $payment->jml_payment = $request->jml_payment;
                $payment->tgl_kirim = $request->tgl_kirim;
                $payment->status_pembayaran = 'Proses';
                $payment->bukti_pembayaran = $nama_files;
                $payment->save();

                if ($payment) {
                    $sewa = sewa::find($sewa->id);
                    $sewa->status = $payment->status_pembayaran;
                    $sewa->save();
                }

                return redirect('my-room');
            }
        } else {
            return redirect('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
