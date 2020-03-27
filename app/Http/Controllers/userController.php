<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sewa;
use App\kamar;
use App\booking;
use Auth;
use Carbon\carbon;

class userController extends Controller
{
    // Kamar Saya
    public function myroom()
    {
        if (auth::check()) {
            if (auth::user()->role == "User") {
                $room = sewa::selectRaw('sewas.*,a.nama_kamar,a.id as kamar')
                    ->leftJoin('kamars as a','a.id','=','sewas.kamar_id')
                    ->where('sewas.user_id', auth::user()->id)
                    ->first();
        
                $date =  Carbon::parse(@$room->end)->diffInDays(now());
                
                return view('user.room.index', compact('room','date'));
            } else {
                return redirect('dashboard');
            }
        } 
    }
}
