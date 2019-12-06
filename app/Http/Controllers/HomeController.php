<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
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
        if (auth::user()->role == "Owner") {
            return view('owner.index');
        }elseif(auth::user()->role == "User") {
            $sewa = sewa::selectRaw('sewas.*,a.nama_kamar,a.jenis_kamar')
            ->leftJoin('kamars as a','a.id','=','sewas.kamar_id')
            ->where('sewas.user_id',auth::user()->id)->get();

            return view('user.index', compact('sewa'));
        }
    }
}
