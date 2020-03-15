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
        if (auth::user()->role == "Owner") {
            return view('owner.index');
        }elseif(auth::user()->role == "User") {
            // $sewa = kamar::with('sewas')->get();
            $sewa = Kamar::selectRaw('kamars.*,a.user_id,a.kamar_id,a.user_id,a.status')
            ->leftJoin('sewas as a','a.kamar_id','=','kamars.id')
            ->groupBy('a.user_id')
            ->where('a.user_id',auth::user()->id)
            ->get();
            return view('user.index', compact('sewa'));
        }
    }
}
