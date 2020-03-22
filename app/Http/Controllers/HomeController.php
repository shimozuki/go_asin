<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kamar;
use App\sewa;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth::check()) {
            if (auth::user()->role == "Owner") {
                $notif = kamar::selectRaw('kamars.id,kamars.id_user,a.id,a.status,a.pemilik_id,a.user_id')
                    ->leftJoin('sewas as a','a.kamar_id','=','kamars.id')
                    ->where('a.pemilik_id',auth::user()->id)
                    ->where('a.status','Proses')
                    ->first();
                $user = sewa::selectRaw('sewas.pemilik_id,sewas.user_id,sewas.lama_sewa,a.name')
                ->leftJoin('users as a','a.id','=','sewas.user_id')
                ->where('pemilik_id',auth::user()->id)
                ->groupBy('sewas.user_id')
                ->limit(6)
                ->get();
                return view('owner.index', compact('notif','user'));
            }elseif(auth::user()->role == "User") {
                $sewa = Kamar::selectRaw('kamars.*,a.user_id,a.kamar_id,a.user_id,a.status')
                ->leftJoin('sewas as a','a.kamar_id','=','kamars.id')
                ->groupBy('a.user_id')
                ->where('a.user_id',auth::user()->id)
                ->get();
                return view('user.index', compact('sewa'));
            }
        } else {
            return redirect('dashboard');
        }
    }
}
