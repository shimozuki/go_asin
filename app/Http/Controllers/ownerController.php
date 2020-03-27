<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\kamar;
use App\sewa;
use App\payment;
use Auth;
use Carbon\carbon;
use Mail;

class ownerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Profile
        if (auth::check()) {
            if (auth::user()->role == "Owner") {
                $profil = user::where('id',auth::user()->id)->get();
                return view('owner.profile.index', compact('profil'));
            }
        } else {
            return redirect('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //Profile
        if (auth::check()) {
            if (auth::user()->role == "Owner") {
                $profil = user::find($id);
                return view('owner.profile.edit', compact('profil'));
            }
        } else {
            return redirect('dashboard');
        }
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
       if (auth::check()) {
           if (auth::user()->role == "Owner") {
                $foto = $request->file('foto');
                $nama_foto = time()."_".$foto->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'foto_profile';
                $foto->move($tujuan_upload,$nama_foto);
        
                $profil = User::find($id);
                $profil->nama_bank = $request->nama_bank;
                $profil->no_rek = $request->no_rek;
                $profil->no_ktp = $request->no_ktp;
                $profil->no_telp = $request->no_telp;
                $profil->no_npwp = $request->no_npwp;
                $profil->foto = $nama_foto;
                $profil->save();
        
                return redirect('owner');
           }
       } else {
           return redirect('dashboard');
       }
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

    // Pembayaran User Detail
    public function detailPayment($id, $user_id)
    {
        if (auth::check()) {
            if (auth::user()->role == "Owner") {
                $kamar = kamar::selectRaw('kamars.*,kamars.id as id_kamar,a.id,a.user_id,a.kamar_id,a.lama_sewa,a.notes,a.id as idsewa,a.status as status_payment,a.pemilik_id,b.nama_pengirim,b.nama_bank,b.no_rek_pengirim,b.tgl_kirim,b.id as sewa_ids,b.status_pembayaran,b.jml_payment')
                    ->leftJoin('sewas as a','a.kamar_id','=','kamars.id')
                    ->leftJoin('payments as b','b.sewa_id','=','a.id')
                    ->where('a.pemilik_id',auth::user()->id)
                    ->where('a.user_id',$user_id)
                    ->first();
                if ($kamar->status_pembayaran == 'Lunas') {
                    return redirect('dashboard');
                } elseif($kamar->sewa_ids == null){
                    return redirect('dashboard');
                }  else {
                    return view('owner.kamar.payment_detail', compact('kamar'));
                }
            }
        }
    }

    // Pembayaran diproses
    public function setujuiPayment(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "Owner") {
                $update = sewa::find($request->idsewa);
                if ($update->jenis == "Sewa") {
                    $update->update([
                        'status'    => 'Lunas',
                        'start'     => Carbon::now()->format('d-m-Y'),
                        'end'       => Carbon::now()->addDays(30)->format('d-m-Y'),
                    ]);
                } elseif ($update->jenis == "Booking") {
                    $update->update([
                        'status'    => 'Lunas',
                        'start'     => $update->tgl_book,
                        'end'       => Carbon::now()->addDays(30)->format('d-m-Y'),
                    ]);
                }
                
                if ($update) {
                    $payment = payment::find($request->sewa_ids);
                    $payment->update([
                        'approve_by' => auth::user()->id,
                        'status_pembayaran' => 'Lunas',
                    ]);
                }
                if ($update && $payment) {
                    $kamar = kamar::find($request->id_kamar);
                    $kamar->update([
                        'sisa_kamar' =>  $kamar->sisa_kamar - 1,
                    ]);
                } 
                if ($payment && $update && $kamar) {
                     // Menyiapkan data
                     $email = $update->email_user;
                     $data = array(
                         'nama_user'     => $update->nama_user,
                     );
                         
                     // Kirim Email
                     Mail::send('owner.email.penghuni', $data, function($mail) use ($email, $data){
                         $mail->to($email,'no-replay')
                                 ->subject("Papi Kost - Kamar Aktif");
                         $mail->from('papikost.dev@gmail.com');
                     });

                    return redirect('dashboard');
                }
            }
        }
    }
}
