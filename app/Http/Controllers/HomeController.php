<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\carbon;

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
      if (Auth::check()) {
        if (Auth::user()->role == 'Pemilik') {
          return view('pemilik.index');
        } elseif(Auth::user()->role == 'Pencari') {
          return view('user.index');
        } else {
          abort(404);
        }
      }
    }
}
