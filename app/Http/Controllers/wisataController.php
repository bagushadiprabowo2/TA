<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class wisataController extends Controller
{
    public function index()
    {
    	$wisata = DB::select("select b.*,(select nama_kota from kota where id=b.id_kota)as nama_kota from wisata b");
    	return view('admin.wisata',['wisata' => $wisata]);
 
    }

    public function tambah()
    {
    	$wisata = DB::select("SELECT * FROM kota");
    	return view('admin.tambahwisata')->with('wisata',$wisata);

    }

    public function store(Request $request)
    {
		$exits = DB::select("SELECT * FROM wisata WHERE nama_wisata = '" .$request->nama_wisata. "';");
        if (count($exits) > 0) {
            return back()->with('error', '');
        } else {
    	DB::table('wisata')->insert([
    		'id_wisata'   => $request->id_wisata,
    		'id_kota'     => $request->id_kota,
    		'nama_wisata' => $request->nama_wisata
    	]);
    	return redirect('wisata');
    }
	}
    
    public function hapus($id){
    	DB::table('wisata')->where('id_wisata', $id)->delete();
    	return redirect('wisata');
    }

    public function edit($id)
    {
        $wisata = DB::table('wisata')->where('id_wisata',$id)->get();
        $kota = DB::table('kota')->get();
        return view('admin.editwisata',['wisata' => $wisata, 'kota' => $kota]);
 
    }

    public function update(Request $request)
    {
        DB::table('wisata')->where('id_wisata',$request->id_wisata)->update([
            'id_wisata'   	    => $request->id_wisata,
            'id_kota'   	    => $request->id_kota,
            'nama_wisata'       => $request->nama_wisata
        ]);
        return redirect('wisata');
    }
}

