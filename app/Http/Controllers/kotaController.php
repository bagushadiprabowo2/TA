<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class kotaController extends Controller
{
    public function index()
    {
    	$kota = DB::table('kota')->get();
    	return view('admin.kota',['kota' => $kota]);
 
    }

    public function tambah()
    {
    	$kota = DB::table('kota')->get();
    	return view('admin.tambahkota')->with('kota',$kota);

    }

    public function store(Request $request)
    {
        $exits = DB::select("SELECT * FROM kota WHERE nama_kota = '" .$request->nama_kota. "';");
        if (count($exits) > 0) {
            return back()->with('error', '');
        } else {
            DB::table('kota')->insert([
                'nama_kota' => $request->nama_kota
            ]);
            return redirect('kota');
        }
    }
    
    public function hapus($id){
    	DB::table('kota')->where('id', $id)->delete();
    	return redirect('kota');
    }

    public function edit($id)
    {
        $kota = DB::table('kota')->where('id',$id)->get();
        return view('admin.editkota',['kota' => $kota]);
 
    }

    public function update(Request $request)
    {
        DB::table('kota')->where('id',$request->id_kota)->update([
            'nama_kota'       => $request->nama_kota
        ]);
        return redirect('kota');
    }
}

