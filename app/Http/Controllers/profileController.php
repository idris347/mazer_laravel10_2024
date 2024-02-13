<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index(){
        $user_id=Auth::id();
        $data = DB::table('users')->where('id',$user_id)->get();
        return view('profile.index',compact('data'));
    }

    public function security(){
        $user_id=Auth::id();
        $data = DB::table('users')->where('id',$user_id)->get();
        return view('profile.change',compact('data'));
    }

    public function ubah_pass(Request $request){
        $this->validate($request, [
            'new_password' => 'required',
            'repeat_password' => 'required',
            
        ], [
            'new_password' => 'data tidak boleh kosong',
            'repeat_password' => 'data tidak boleh kosong',
         ]);
       
       if(!Hash::check($request->old_password,auth()->user()->password)){

        return back()->with('error','password lama anda keliru');

       }
       if ($request->new_password != $request->repeat_password) {
        return back()->with('error','masukan ulang password anda salah');
       }

       $query =DB::table('users')->where('is_admin', $request->is_admin)->update([
        'password'=>hash::make($request->new_password)

    ]);
    if ($query) {
        return back()->with('status','ubah password selesai');
    }
       
    }
}
