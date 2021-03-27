<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kamar;

class FrontendsController extends Controller
{
    //Homepage
    public function homepage()
    {
      $kamar = Kamar::all();
      return view('frontend.index', compact('kamar'));
    }
}
