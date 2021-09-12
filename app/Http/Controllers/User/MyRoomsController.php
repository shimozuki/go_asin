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
      $tanah = Transaction::where('user_id', Auth::id())->whereNotIn('status',['Pending'])->get();
      return view('user.tanah.index', compact('tanah'));
    }
}
