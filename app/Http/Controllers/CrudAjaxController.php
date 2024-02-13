<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CrudAjaxController extends Controller
{
    public function index(){
        $user = Auth::user();
        $is_admin = $user->is_admin;
        
        if ($is_admin) {
            $data = DB::table('products')
                ->join('users', 'users.id', '=', 'products.user_id')
                ->select('products.id as product_id', 'products.*', 'users.name as user_name')
                ->get();
        } else {
            $data = DB::table('products')
                ->join('users', 'users.id', '=', 'products.user_id')
                ->select('products.id as product_id', 'products.*', 'users.name as user_name')
                ->where('user_id', $user->id)
                ->get();
        }
        return view('cruda.index',compact('data'));
    }
}
