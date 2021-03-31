<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Transaction};
use Auth;

class MyRoomsController extends Controller
{
    // My Room
    public function myroom()
    {
      $kamar = Transaction::where('user_id', Auth::id())->whereIn('status',['Proses','Done','Cancel','Reject'])->get();
      return view('user.kamar.index', compact('kamar'));
    }
}
