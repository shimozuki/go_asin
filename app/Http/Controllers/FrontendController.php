<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;

class FrontendController extends Controller
{
    // Card Kos
    public function cardkos()
    {
        $kos = kamar::get();
        return view('welcome', compact("kos"));
    }
}
