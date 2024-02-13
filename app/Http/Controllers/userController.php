<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index(){

      $user = Auth::user();
      $is_admin = $user->is_admin;
      
      if ($is_admin) {
          $data = DB::table('users')->get();
      } else {
          $data = DB::table('users')
              ->where('id', $user->id)
              ->get();
      }

        return view('user.index',compact('data'));

    }
}
