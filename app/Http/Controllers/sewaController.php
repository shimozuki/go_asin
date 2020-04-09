<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kamar;
use App\profil;
use App\sewa;
use App\User;
use Auth;
use Carbon\carbon;
use Mail;

class sewaController extends Controller
{
    // Index Sewa Kamar
    public function index($id)
    {
       if (auth::check()) {
           if (auth::user()->role == "User") {
                $cek = sewa::where('user_id',auth::user()->id)->first();
                $sewa = kamar::selectRaw('kamars.*,a.nama_bank,a.no_rek,a.name')
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

    // Index Booking Kamar
    public function book($id)
    {
       if (auth::check()) {
           if (auth::user()->role == "User") {
                $cek = sewa::where('user_id',auth::user()->id)->first();
                $book = kamar::where('book',1)->where('id_user',auth::user()->id)->first();
                $kamar = kamar::selectRaw('kamars.*,a.nama_bank,a.no_rek')
                ->leftJoin('users as a','a.id','=','kamars.id_user')
                ->where('kamars.id',$id)->get();
                if (@$cek->user_id == null ) {
                    return view('user.booking.index', compact('kamar','cek'));
                } elseif($book) {
                    return redirect()->back();
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
                $y = date('Y');
                $number = mt_rand(1000, 9999);
                // Nomor Form otomatis
                $invoice = $number. '/ORDER'.'/'.$y;

                $sewa = new sewa;
                $sewa->user_id = auth::user()->id;
                $sewa->nama_user = auth::user()->name;
                $sewa->email_user = auth::user()->email;
                $sewa->kamar_id = $request->kamar_id;
                $sewa->lama_sewa = $request->lama_sewa;
                $sewa->pemilik_id = $request->pemilik_id;
                $sewa->nama_pemilik = $request->nama_pemilik;
                $sewa->email_pemilik = $request->email_pemilik;
                $sewa->nama_kamar = $request->nama_kamar;
                $sewa->harga_kamar = $request->harga_kamar;
                $sewa->nama_bank = $request->nama_bank;
                $sewa->invoice = $invoice;
                $sewa->no_rek = $request->no_rek;
                $sewa->status = 'Menunggu Pembayaran';
                $sewa->start = Carbon::now()->format('d-m-Y');
                $sewa->end = Carbon::parse($sewa->start)->addDays(30)->format('d-m-Y');
                $sewa->jenis = 'Sewa';
                $sewa->notes = $request->notes;
                if ($sewa->save()) {
                    // Menyiapkan data
                    $email = $sewa->email_user;
                    $data = array(
                        'invoice'       => $invoice,
                        'nama_user'     => $sewa->nama_user,
                        'start'         => $sewa->start,
                        'nama_kamar'     => $sewa->nama_kamar,
                        'harga_kamar'   => $sewa->harga_kamar,
                        'nama_bank'     => $sewa->nama_bank,
                        'no_rek'        => $sewa->no_rek,
                        'jenis'         => 'Sewa',
                    );
                        
                    // Kirim Email
                    Mail::send('user.email.index', $data, function($mail) use ($email, $data){
                        $mail->to($email,'no-replay')
                                ->subject("Papi Kost - Invoice Pembayaran");
                        $mail->from('papikost.dev@gmail.com');
                    });
                }
                return redirect('my-room');
            }
        } else {
            return redirect('dashboard');
        }
    }

    // Proses booking
    public function prosesBooking(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "User") {

                $y = date('Y');
                $number = mt_rand(1000, 9999);
                // Nomor Form otomatis
                $invoice = $number. '/BOOK'.'/'.$y;

                $book = new sewa;
                $book->user_id = auth::user()->id;
                $book->nama_user = auth::user()->name;
                $book->email_user = auth::user()->email;
                $book->kamar_id = $request->kamar_id;
                $book->lama_sewa = '1';
                $book->pemilik_id = $request->pemilik_id;
                $book->nama_pemilik = $request->nama_pemilik;
                $book->email_pemilik = $request->email_pemilik;
                $book->nama_kamar = $request->nama_kamar;
                $book->harga_kamar = $request->harga_kamar;
                $book->nama_bank = $request->nama_bank;
                $book->no_rek = $request->no_rek;
                $book->invoice = $invoice;
                $book->status = 'Menunggu Pembayaran';
                $book->start = 0;
                $book->end = 0;
                $book->tgl_book = Carbon::parse($book->tgl_book)->format('d-m-Y');
                $book->jenis = 'Booking';
                $book->notes = $request->notes;
                if ($book->save()) {
                    // Menyiapkan data
                    $email = $book->email_user;
                    $data = array(
                        'invoice'       => $invoice,
                        'nama_user'     => $book->nama_user,
                        'start'         => $book->start,
                        'nama_kamar'    => $book->nama_kamar,
                        'harga_kamar'   => $book->harga_kamar,
                        'nama_bank'     => $book->nama_bank,
                        'no_rek'        => $book->no_rek,
                        'jenis'         => 'Booking',
                    );
                        
                    // Kirim Email
                    Mail::send('user.email.index', $data, function($mail) use ($email, $data){
                        $mail->to($email,'no-replay')
                                ->subject("Papi Kost - Invoice Pembayaran");
                        $mail->from('papikost.dev@gmail.com');
                    });
                }
                return redirect('my-room');
            }
        } else {
            return redirect('dashboard');
        }
    }


    // get nama kamar
    public function namakamar(Request $request)
    {
        $nama = kamar::select('id','nama_kamar')
        ->where('id',$request->id)
        ->get();

        $select = '';
        $select .= '
                    <div class="form-group has-success" hidden>
                    <select class="form-control" name="nama_kamar">
                    ';
                    foreach ($nama as $item) {
        $select .= '<option value="'.$item->nama_kamar.'">'.$item->nama_kamar.'</option>';
                    }'
                    </select>
                    </div>
                    </div>';
        return $select;
    }

    // get harga kamar
    public function hargakamar(Request $request)
    {
        $harga = kamar::select('id','harga_kamar')
        ->where('id',$request->id)
        ->get();

        $select = '';
        $select .= '
                    <div class="form-group has-success" hidden>
                    <select class="form-control" name="harga_kamar">
                    ';
                    foreach ($harga as $item) {
        $select .= '<option value="'.$item->harga_kamar.'">'.$item->harga_kamar.'</option>';
                    }'
                    </select>
                    </div>
                    </div>';
        return $select;
    }

    // get Nama Bank
    public function namabank(Request $request)
    {
        $harga = User::select('id','nama_bank')
        ->where('id',$request->id_user)
        ->get();

        $select = '';
        $select .= '
                    <div class="form-group has-success" hidden>
                    <select class="form-control" name="nama_bank">
                    ';
                    foreach ($harga as $item) {
        $select .= '<option value="'.$item->nama_bank.'">'.$item->nama_bank.'</option>';
                    }'
                    </select>
                    </div>
                    </div>';
        return $select;
    }

    // get Nama Bank
    public function norek(Request $request)
    {
        $harga = User::select('id','no_rek')
        ->where('id',$request->id_user)
        ->get();

        $select = '';
        $select .= '
                    <div class="form-group has-success" hidden>
                    <select class="form-control" name="no_rek">
                    ';
                    foreach ($harga as $item) {
        $select .= '<option value="'.$item->no_rek.'">'.$item->no_rek.'</option>';
                    }'
                    </select>
                    </div>
                    </div>';
        return $select;
    }

    // get Nama Bank
    public function emailpemilik(Request $request)
    {
        $email = User::select('id','email')
        ->where('id',$request->id_user)
        ->get();

        $select = '';
        $select .= '
                    <div class="form-group has-success" hidden>
                    <select class="form-control" name="email_pemilik">
                    ';
                    foreach ($email as $item) {
        $select .= '<option value="'.$item->email.'">'.$item->email.'</option>';
                    }'
                    </select>
                    </div>
                    </div>';
        return $select;
    }
}
