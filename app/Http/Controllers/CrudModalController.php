<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CrudModalController extends Controller
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
        return view('crudm.index',compact('data'));
    }
    public function tambah1(Request $request){
        $user_id = Auth::id();
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('crudm.index') 
                ->withErrors($validator)
                ->withInput()
                ->with('showModal', true); // Menambahkan variabel show modal ke session
            }
        $foto = $request->file('foto');
        $nama_file = time()."_".$foto->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $foto->move($tujuan_upload, $nama_file);        
        $qry = DB::table('products')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'foto' => $nama_file,
            'user_id' => $user_id

        ]);
    
        if ($qry) {
            session()->flash('success', 'Data berhasil ditambahkan');
            return redirect()->route('crudm.index');       
        }
    }
}
