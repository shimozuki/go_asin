<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{DataUser,User,Testimoni};
use Auth;
use Session;

class UserprofileController extends Controller
{
     //Profile
     public function profile()
     {
       return view('user.profile.index');
     }
 
     // Proses Payment
     public function payment_profile(Request $request, $user_id)
     {
       $request->validate([
         'nomor_ktp' => 'required',
         'tlp' => 'required',
       ]);
 
       $datauser = DataUser::where('user_id', $user_id)->first();
       $datauser->nomor_ktp      = $request->nomor_ktp;
       $datauser->tlp   = $request->tlp;
       $datauser->save();
 
       Session::flash('success','Data Payment Berhasil Disimpan');
       return back();
     }
 
     // Testimoni
     public function testimoni(Request $request)
     {
       Testimoni::create([
         'user_id'   => Auth::id(),
         'testimoni' => $request->testimoni
       ]);
 
       return back();
     }
}
