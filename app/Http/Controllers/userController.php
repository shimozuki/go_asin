<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sewa;
use App\kamar;
use Auth;

class userController extends Controller
{
    // Kamar Saya
    public function myroom()
    {
        if (auth::check()) {
            if (auth::user()->role == "User") {
                $room = sewa::selectRaw('sewas.*,a.nama_kamar')
                    ->leftJoin('kamars as a','a.id','=','sewas.kamar_id')
                    ->where('sewas.user_id', auth::user()->id)
                    ->first();
                return view('user.room.index', compact('room'));
            } else {
                return redirect('dashboard');
            }
        } 
    }
}
