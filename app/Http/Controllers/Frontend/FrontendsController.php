<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{kamar,provinsi,Testimoni,User};

class FrontendsController extends Controller
{
    //Homepage
    public function homepage()
    {
      $kamar = kamar::all();
      $countkamar = kamar::count();
      $Testimoni = Testimoni::with('User')->get();
      // dd($Testimoni);
      return view('frontend.index', compact('kamar','countkamar','Testimoni'));
    }

    // Show Kamar
    public function showkamar($slug)
    {
      $kamar = kamar::where('slug', $slug)->first();
      return view('frontend.show', compact('kamar'));
    }

}
