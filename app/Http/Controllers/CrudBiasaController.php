<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CrudBiasaController extends Controller
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
        return view('crudb.index',compact('data'));
    }
    public function tambah(){
        $user_id = Auth::id();
        $carts = DB::table('products')->join('users','users.id','=','products.user_id')->select('users.*','products.*')->Where('user_id',$user_id)->get();
        return view('crudb.create',compact('carts'));
    }
    public function submit(Request $request){
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
            return redirect()->route('crudb.create') // Gantilah 'nama_routemu' dengan nama route Anda
                ->withErrors($validator)
                ->withInput();
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
            return redirect()->route('crudb.index');       
        }
    }
    public function hapus($id) {
        $barang = DB::table('products')->where('id', $id)->first();
    
        if (!$barang) {
            // Handle jika data tidak ditemukan
            return redirect()->route('crudb.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Hapus foto
        if (File::exists(public_path('data_file/' . $barang->foto))) {
            File::delete(public_path('data_file/' . $barang->foto));
        }
    
        $qry = DB::table('products')->where('id', $id)->delete();
    
        if ($qry) {
            session()->flash('success', 'Data berhasil dihapus');
        } else {
            session()->flash('error', 'Gagal menghapus data');
        }
    
        return redirect()->route('crudb.index');
    }
    public function edit($id)
    {
        $data = array(
            'data'    => DB::table('products')->where('id', $id)->get(),
        );
        return view('crudb.edit', $data);
    }
    public function update(Request $request, $id) {
        $barang = DB::table('products')->where('id', $id)->first();
    
        if (!$barang) {
            // Handle jika data tidak ditemukan
            return redirect()->route('crudb.index')->with('error', 'Data tidak ditemukan');
        }
    
        $foto = $request->file('foto');
        $nama_file = $barang->foto;
    
        if ($foto) {
            // Hapus foto awal
            if (File::exists(public_path('data_file/' . $nama_file))) {
                File::delete(public_path('data_file/' . $nama_file));
            }
    
            // Upload foto baru
            $nama_file = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $foto->move($tujuan_upload, $nama_file);
        }
    
        $qry = DB::table('products')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'deskripsi'=>$request->deskripsi,
                'jumlah' => $request->jumlah,
                'satuan' => $request->satuan,
                'foto' => $nama_file,
            ]);
    
        if ($qry) {
            session()->flash('success', 'Data berhasil diupdate');
            return redirect()->route('crudb.index');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate data');
        }
    }

}
