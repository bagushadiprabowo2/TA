<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class usahaController extends Controller
{
    public function index()
    {
    	$usaha = DB::select("select b.*,(select nama from pengguna where id_pengguna=b.id_pelapak)as nama from usaha b");
        $usaha_paket = DB::select("select b.*,(select nama_usaha from usaha where id_usaha=b.id_usaha) as nama_usaha from paket b");
     	return view('admin.usaha',['usaha' => $usaha, 'usaha_paket' => $usaha_paket]);
 
    }

    public function tambah()
    {
    	$pengguna = DB::table('pengguna')->get();
        $kota = DB::table('kota')->get();
    	return view('admin.tambahusaha', ['pengguna' => $pengguna, 'kota' => $kota]);

    }

    public function tambah_paket()
    {
        $paket = DB::table('paket')->get();
        $usaha = DB::table('usaha')->get();        
        return view('admin.tambahpaket', ['paket' => $paket,'usaha'=>$usaha]);
    }

    public function tambah_paket_pelapak($id)
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $paket = DB::table('paket')->get();
        $usaha = DB::table('usaha')->where('id_usaha',$id)->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();        
        return view('front end.tambahpaket', ['paket' => $paket,'usaha'=>$usaha, 'saldo'=>$saldo,'pengguna'=>$pengguna]);
    }


    public function store(Request $request)
    {
        $file1 = $request->file('foto1');
        $ext1 = $file1->getClientOriginalExtension();
        $newName1 = rand(100000,1001238912).".".$ext1;
        $file1->move('images/usaha',$newName1);

        $file2 = $request->file('foto2');
        $ext2 = $file2->getClientOriginalExtension();
        $newName2 = rand(100000,1001238912).".".$ext2;
        $file2->move('images/usaha',$newName2);
        if ($request->file('foto3')) {
            $file3 = $request->file('foto3');
            $ext3 = $file3->getClientOriginalExtension();
            $newName3 = rand(100000,1001238912).".".$ext3;
            $file3->move('images/usaha',$newName3);
        }
        $data['id_pelapak'] = $request->id_pelapak;
        $data['id_paket'] = $request->id_paket;
        $data['nama_usaha'] = $request->nama_usaha;
        $data['kota']=$request->id_kota;
        $data['foto1']=$newName1;
        $data['foto2']=$newName2;
        if ($request->file('foto3')) {
        $data['foto3']=$newName3;
        }
        $data['deskripsi']=$request->deskripsi;
    	DB::table('usaha')->insert($data);
    	return redirect('usaha');
    }

        public function store_paket(Request $request)
    {
        DB::table('paket')->insert([
            'id_usaha'          => $request->id_usaha,
            'nama_paket'        => $request->nama_paket,
            'harga'             => $request->harga,
            'deskripsi'         => $request->deskripsi
        ]);
        return redirect('usaha');
    }

          public function store_paket_pelapak(Request $request)
    {
        DB::table('paket')->insert([
            'id_usaha'          => $request->id_usaha,
            'nama_paket'        => $request->nama_paket,
            'harga'             => $request->harga,
            'deskripsi'         => $request->deskripsi
        ]);
        return redirect('usahaku');
    }


    public function hapus($id){
    	DB::table('usaha')->where('id_usaha', $id)->delete();
    	return redirect('usaha');
    }

    public function hapus_paket($id){
        DB::table('paket')->where('id', $id)->delete();
        return redirect('usaha');
    }


    public function show(Request $request,$id){
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $tampilkan =    DB::table('usaha')->where('id_usaha',$id)->get();
        $paket =        DB::table('paket')->where('id_usaha',$id)->get();
        $usaha = \DB::select('SELECT *,case  when total_rating IS NULL then 0 else total_rating END as rating FROM (SELECT *,(select Round(AVG(rating),0) from komen where id_usaha=u.nama_usaha) total_rating FROM `usaha` u) abc where id_usaha=:id',['id'=>$id]);
        $komen =        DB::select("select * from (SELECT *,(select id_usaha from usaha where nama_usaha = k.id_usaha) as nama_usaha FROM `komen` k) abc where nama_usaha=:nama",['nama'=>$id]);
        return view('front end.single',['tampilkan'=>$tampilkan, 'paket' => $paket, 'komen' => $komen,'saldo'=>$saldo, 'usaha'=>$usaha,'pengguna'=>$pengguna]);
    }

     public function edit_usaha($id_usaha)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $usaha = DB::table('usaha')->where('id_usaha',$id_usaha)->get();
        $kota = DB::table('kota')->get();
        $pengguna = DB::table('pengguna')->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('admin.editusaha',['edit_usaha' => $usaha,'kota'=>$kota, 'pengguna'=>$pengguna]);
 
    }

    public function edit_usaha_pelapak($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $usaha = DB::table('usaha')->where('id_usaha',$id)->get();
        $kota = DB::table('kota')->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('front end.editusaha',['edit_usaha' => $usaha,'kota'=>$kota, 'pengguna'=>$pengguna,'saldo'=>$saldo]);
 
    }

    public function edit_paket($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $paket = DB::table('paket')->where('id',$id)->get();
        $usaha = DB::table('usaha')->get();
        return view('admin.editpaket',['paket' => $paket,'usaha'=>$usaha]);
 
    }

    
    public function update_usaha(Request $request)
    {$file1 = $request->file('foto1');
        $ext1 = $file1->getClientOriginalExtension();
        $newName1 = rand(100000,1001238912).".".$ext1;
        $file1->move('images/usaha',$newName1);

        $file2 = $request->file('foto2');
        $ext2 = $file2->getClientOriginalExtension();
        $newName2 = rand(100000,1001238912).".".$ext2;
        $file2->move('images/usaha',$newName2);
        if ($request->file('foto3')) {
            $file3 = $request->file('foto3');
            $ext3 = $file3->getClientOriginalExtension();
            $newName3 = rand(100000,1001238912).".".$ext3;
            $file3->move('images/usaha',$newName3);
        }
        $data['id_pelapak'] = $request->id_pelapak;
        $data['nama_usaha'] = $request->nama_usaha;
        $data['kota']       = $request->kota;
        $data['foto1']      = $newName1;
        $data['foto2']      = $newName2;
        if ($request->file('foto3')) {
        $data['foto3']=$newName3;
        }
        $data['deskripsi']=$request->deskripsi;
        DB::table('usaha')->where('id_usaha',$request->id_usaha)->update($data);
        return redirect('usaha');
    }

    public function update_usaha_pelapak(Request $request)
    {$file1 = $request->file('foto1');
        $ext1 = $file1->getClientOriginalExtension();
        $newName1 = rand(100000,1001238912).".".$ext1;
        $file1->move('images/usaha',$newName1);

        $file2 = $request->file('foto2');
        $ext2 = $file2->getClientOriginalExtension();
        $newName2 = rand(100000,1001238912).".".$ext2;
        $file2->move('images/usaha',$newName2);
        if ($request->file('foto3')) {
            $file3 = $request->file('foto3');
            $ext3 = $file3->getClientOriginalExtension();
            $newName3 = rand(100000,1001238912).".".$ext3;
            $file3->move('images/usaha',$newName3);
        }
        $data['id_pelapak'] = $request->id_pelapak;
        $data['nama_usaha'] = $request->nama_usaha;
        $data['kota']       = $request->kota;
        $data['foto1']      = $newName1;
        $data['foto2']      = $newName2;
        if ($request->file('foto3')) {
        $data['foto3']=$newName3;
        }
        $data['deskripsi']=$request->deskripsi;
        DB::table('usaha')->where('id_usaha',$request->id_usaha)->update($data);
        return redirect('usahaku');
    }


        public function update_paket(Request $request)
    {
        // update data pegawai
        DB::table('paket')->where('id',$request->id)->update([
            'id_usaha'         => $request->id_usaha,
            'nama_paket'       => $request->nama_paket,
            'harga'            => $request->harga,
            'deskripsi'        => $request->deskripsi
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('usaha');
    }
}