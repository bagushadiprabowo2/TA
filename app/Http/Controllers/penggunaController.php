<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ModelPengguna;
use Validator;


class penggunaController extends Controller
{
     public function index()
	{
    	$pengguna = DB::select("select b.*,(select level from user_level where ID=b.id_level)as level from pengguna b");
        $saldo = DB::select("select b.*,(select nama from pengguna where id_pengguna=b.id_pengguna)as nama from saldo b");
        return view('admin.pengguna',['pengguna' => $pengguna, 'saldo'=>$saldo]);
 
	}

    public function tambah()
    {
    	$pengguna = DB::table('pengguna')->get();
    	return view('admin.tambahpengguna')->with('pengguna',$pengguna);

    }
    public function store(Request $request)
    {
		$exits = DB::select("SELECT * FROM pengguna WHERE username = '" .$request->username. "';");
        if (count($exits) > 0) {
            return back()->with('error', '');
        } else {
    	$this->validate($request, [
            'nama'      => 'required|min:4',
            'kota_asal' => 'required|min:4',
            'username'  => 'required|min:4|email|unique:pengguna',
            'password'  => 'required',
            'id_level'  => 'required',
        ]);

        $data =  new ModelPengguna();
        $data->nama = $request->nama;
        $data->kota_asal = $request->kota_asal;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->id_level = $request->id_level;
        $data->save();
    	return redirect('pengguna');
    }
	}

    public function hapus($id){
    	DB::table('pengguna')->where('id_pengguna', $id)->delete();
    	return redirect('pengguna');
    }


    public function edit($id_pengguna)
    {
        $pengguna = DB::table('pengguna')->where('id_pengguna',$id_pengguna)->get();
        return view('admin.editpengguna',['pengguna' => $pengguna]);
    }

    public function update(Request $request)
    {
        DB::table('pengguna')->where('id_pengguna',$request->id_pengguna)->update([
            'id_level'   => $request->id_level,
            'nama'       => $request->nama,
            'kota_asal'  => $request->kota_asal,
            'username'   => $request->username,
            'password'   => $request->password
        ]);
        return redirect('pengguna');
    }
}

