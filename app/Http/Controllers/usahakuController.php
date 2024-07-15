<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\NotifikasiController;


class usahakuController extends Controller
{
    protected $notifikasiController;

    public function __construct(NotifikasiController $notifikasiController)
    {
        $this->notifikasiController = $notifikasiController;
    }

	public function index()
    {
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $cek = DB::table('usaha')->where('id_pelapak', session()->get('id_pengguna'))->count();

        $senderType = session()->get('level') == 3 ? 'pelapak' : 'pelanggan';
        $notifikasiCounts = $this->notifikasiController->getCountByDestinationId(session()->get('id_pengguna'), $senderType);
        $notifications = $this->notifikasiController->getByDestinationId(session()->get('id_pengguna'), $senderType);
        // dd($cek > 0);
        if ($cek > 0) {
            $id_usaha = \DB::table('usaha')->where('id_pelapak', session()->get('id_pengguna'))->value('id_usaha');
            $tampilkan = DB::table('usaha')->where('id_usaha',$id_usaha)->get();
            $paket = DB::table('paket')->where('id_usaha',$id_usaha)->get();
            return view('front end.usahaku',['tampilkan'=>$tampilkan, 'paket' => $paket,'saldo'=>$saldo,'pengguna'=>$pengguna,
            'notifikasiCounts'=>$notifikasiCounts, 'notifications' => $notifications]);
    	} else {
    	$kota = DB::table('kota')->get();
	       return view('front end.daftarusaha',['kota' => $kota,'saldo'=>$saldo,
           'notifikasiCounts'=>$notifikasiCounts, 'notifications' => $notifications]);
    	}
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
        $data['id_pelapak'] = session()->get('id_pengguna');
        $data['nama_usaha'] = $request->nama_usaha;
        $data['kota']=$request->nama_kota;
        $data['foto1']=$newName1;
        $data['foto2']=$newName2;
        if ($request->file('foto3')) {
        $data['foto3']=$newName3;
        }
        $data['deskripsi']=$request->deskripsi;
    	DB::table('usaha')->insert($data);
    	return redirect('usahaku');
    }

   
    public function show(Request $request,$id){

        $tampilkan = DB::table('usaha')->where('id_usaha',$id)->get();
        $paket = DB::table('paket')->where('id_usaha',$id)->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        return view('front end.single',['tampilkan'=>$tampilkan, 'paket' => $paket,'pengguna'=>$pengguna]);
    }
    
    public function show_lapak($id){
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        $show_lapak = DB::table('usaha')->where('id_usaha',$id)->get();
        return view ('front end.usahaku',['show_lapak'=>$show_lapak,'pengguna'=>$pengguna]); 
    }


}
