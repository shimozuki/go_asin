<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{tanah,provinsi,Testimoni,User};

class FrontendsController extends Controller
{
    //Homepage
    public function homepage()
    {
      $tanah = tanah::all();
      $counttanah = tanah::count();
      $Testimoni = Testimoni::with('User')->get();
      // dd($Testimoni);
      return view('frontend.index', compact('tanah','counttanah','Testimoni'));
    }

    // Show tanah
    public function showtanah($slug)
    {
      $tanah = tanah::where('slug', $slug)->first();
      return view('frontend.show', compact('tanah'));
    }

    // show sesuai dengan provinsi
    public function provinsi($provinsi_id)
    {
      $tanah = tanah::where('provinsi_id', $provinsi_id)->get();
      $counttanah = tanah::count();
      $Testimoni = Testimoni::with('User')->get();
      return view('frontend.provinsi', compact('tanah','counttanah','Testimoni'));
    }
    
}
