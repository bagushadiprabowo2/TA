<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\NotifikasiController;
use Carbon\Carbon;

class transaksiController extends Controller
{
    protected $notifikasiController;

    public function __construct(NotifikasiController $notifikasiController)
    {
        $this->notifikasiController = $notifikasiController;
    }

    public function index()
    {
    	$transaksi = DB::table('transaksi')->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
    	return view('front end.single',['transaksi' => $transaksi,'pengguna'=>$pengguna]);
 
    }

    public function riwayat_transaksi()
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $riwayat_transaksi = DB::table('transaksi')->where('id_pelanggan', session()->get('nama'))->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        
        $senderType = session()->get('level') == 3 ? 'pelapak' : 'pelanggan';
        $notifikasiCounts = $this->notifikasiController->getCountByDestinationId(session()->get('id_pengguna'), $senderType);

        $notifications = $this->notifikasiController->getByDestinationId(session()->get('id_pengguna'), $senderType);

		return view('front end.riwayattransaksi',['riwayat_transaksi' => $riwayat_transaksi,'saldo'=>$saldo,'pengguna'=>$pengguna,
            'notifikasiCounts'=>$notifikasiCounts, 'notifications' => $notifications]);
 
    }

    public function riwayat_transaksi_pelapak()
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $riwayat_transaksi_pelapak = DB::table('transaksi')->where('id_pelapak', session()->get('id_pengguna'))->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        
        $senderType = session()->get('level') == 3 ? 'pelapak' : 'pelanggan';
        $notifikasiCounts = $this->notifikasiController->getCountByDestinationId(session()->get('id_pengguna'), $senderType);
        $notifications = $this->notifikasiController->getByDestinationId(session()->get('id_pengguna'), $senderType);

        return view('front end.riwayattransaksi_pelapak',['riwayat_transaksi_pelapak' => $riwayat_transaksi_pelapak,'saldo'=>$saldo,'pengguna'=>$pengguna,
        'notifikasiCounts'=>$notifikasiCounts, 'notifications' => $notifications]);
 
    }

    public function riwayat_topup()
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $riwayat_topup = DB::table('top_up')->where('id_pengguna', session()->get('id_pengguna'))->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();

        $senderType = session()->get('level') == 3 ? 'pelapak' : 'pelanggan';
        $notifikasiCounts = $this->notifikasiController->getCountByDestinationId(session()->get('id_pengguna'), $senderType);
        $notifications = $this->notifikasiController->getByDestinationId(session()->get('id_pengguna'), $senderType);

        return view('front end.riwayattopup',['riwayat_topup' => $riwayat_topup,'saldo'=>$saldo,'pengguna'=>$pengguna,
        'notifikasiCounts'=>$notifikasiCounts, 'notifications' => $notifications]);
 
    }

    public function tambah($id)
    {
        $pesanan = DB::table('transaksi')->where(['id_usaha' => $id, 'status' => '1'])->count();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        // dd($pesanan);
        if ($pesanan <= 0) {
            $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
            $tampilkan = DB::table('usaha')->where('id_usaha',$id)->get();
            $paket = DB::table('paket')->where('id_usaha',$id)->get();
            return view('front end.tambahtransaksi',['tampilkan'=>$tampilkan, 'paket' => $paket,'saldo'=>$saldo,'pengguna'=>$pengguna]);
        } else {
            return back()->with('error', '');
        }

    }

    public function pembatalan($id){
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $transaksi=DB::table('transaksi')->where('id_transaksi',$id)->get();
        return view('front end.pembatalan',['pengguna'=>$pengguna,'saldo'=>$saldo,'transaksi'=>$transaksi]);   
    }

    public function store_pembatalan(Request $request){
        // dd($request);
        $deskripsi = $request->old_deskripsi;
        $deskripsi .= "//Pesan Pembatalan: " . $request->deskripsi;
        // dd($deskripsi);
        DB::table('transaksi')->where('id_transaksi',$request->id_trx)->update([
            'deskripsi'           => $deskripsi
        ]);
        return redirect('transaksi/transaksi_pelapak' . '/' . $request->id_plapak);
    }


    public function topup($id)
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $topup = DB::table('top_up')->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna',$id)->get();
        return view('front end.topup',['pengguna'=>$pengguna, 'topup' => $topup,'saldo'=>$saldo]);

    }

    public function contact()
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        return view('front end.contact',['saldo'=>$saldo,'pengguna'=>$pengguna]);

    }

    public function topup_generate($id)
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $topup = DB::table('top_up')->where('id_pengguna', session()->get('id_pengguna'))->orderBy('id', 'DESC')->first();
        $pengguna = DB::table('pengguna')->where('id_pengguna',$id)->get();
        return view('front end.generate',['pengguna'=>$pengguna, 'topup' => $topup,'saldo'=>$saldo]);

    }

    public function buatkode($id)
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $topup = DB::table('top_up')->where('id_pengguna', session()->get('id_pengguna'))->orderBy('id', 'DESC')->first();
        $pengguna = DB::table('pengguna')->where('id_pengguna',session()->get('id_pengguna'))->get();
        return view('front end.kode',['pengguna'=>$pengguna, 'topup' => $topup,'saldo'=>$saldo]);
    }

    public function toupupsaldo($id, $pengguna, $kode)
    {
        DB::table('top_up')->where('id', $id)->update([
            'kode'   => $kode,
        ]);
        $saldo = \DB::table('top_up')->where('id', $id)->value('jumlah');
        $saldo_lama = \DB::table('saldo')->where('id_pengguna', $pengguna)->value('total');
        $hasil = $saldo_lama + $saldo;
        DB::table('saldo')->where('id_pengguna', $pengguna)->update([
            'total'   => $hasil,
        ]);
        return redirect('index');
    }

    public function store_topup(Request $request)
    {
        $tanggal = date('Y-m-d', strtotime($request->tanggal));
        $data = DB::table('top_up')->insert([
            'tanggal'          => $tanggal,
            'id_pengguna'      => $request->id_pengguna,
            'pembayaran'       => $request->pembayaran,
            'kode'             => $request->kode,
            'jumlah'           => $request->jumlah
        ]);
        return redirect('/transaksi/generate'."/".$request->id_pengguna);
    }
    
    
    public function edit_topup($id)
    {
        $saldo      = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $topup      = DB::table('top_up')->where('id',$id)->orderBy('id', 'DESC')->first();
        $pengguna   = DB::table('pengguna')->where('id_pengguna',$id)->get();
        return view('front end.generate',['topup'=>$topup, 'pengguna'=>$pengguna,'saldo'=>$saldo]);
 
    }  

    public function update_topup(Request $request)
    {
        $tanggal = date('Y-m-d', strtotime($request->tanggal));
        DB::table('topup')->where('id',$request->id)->update([
            'tanggal'          => $tanggal,
            'id_pengguna'      => $request->id_pengguna,
            'pembayaran'       => $request->pembayaran,
            'kode'             => $request->kode,
            'jumlah'           => $request->jumlah
        ]);
        return redirect('index');
    }


    public function store(Request $request)
    {
        // dd($request);
        $tanggal_pesan = date('Y-m-d', strtotime($request->tanggal_pesan));
        $tanggal_hunting = date('Y-m-d', strtotime($request->tanggal_hunting));
        $harga_ = $request->harga * 30 / 100;
        $tot_pemesan = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $selisih = $tot_pemesan - $request->harga;
        // dd($selisih);
        if ($selisih >= 0) {
            DB::table('transaksi')->insert([
                'id_pelanggan'      => $request->id_pelanggan,
                'tanggal_pesan'     => $tanggal_pesan,
                'id_pelapak'        => $request->id_pelapak,
                'id_usaha'          => $request->id_usaha,
                'tanggal_hunting'   => $tanggal_hunting,
                'deskripsi'         => $request->deskripsi,
                'paket'             => $request->pilih_paket,
                'harga'             => $harga_,
                'status'            => '1',
            ]);
            // Pemesan
            $hasil_e = $tot_pemesan - $harga_;
            \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->update(['total' => $hasil_e]);
            // Pemilik
            $tot_pemilik = \DB::table('saldo')->where('id_pengguna', $request->id_pelapak)->value('total');
            $hasil_i = $tot_pemilik + $harga_;
            \DB::table('saldo')->where('id_pengguna', $request->id_pelapak)->update(['total' => $hasil_i]);

            $senderType = session()->get('level') == 2 ? 'pelapak' : 'pelanggan';
            DB::table('notifikasi')->insert([
                'sender_type'       => $senderType,
                'sender_id'         =>  session()->get('id_pengguna'),
                'destination_id'    =>  $request->id_pelapak,
                'message'           => 'Ada transaksi baru masuk dari '. session()->get('nama'),
                'status'            => 'unread',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect('index');
        } else {
            return redirect('/transaksi/topup/' . session()->get('id_pengguna'))->with('error', '');
        }
    }
    public function show()
    {
        $transaksi = DB::table('transaksi')->get();
        $topup=DB::select("select b.*,(select nama from pengguna where id_pengguna=b.id_pengguna)as nama from top_up b");
        return view('admin.admin',['transaksi' => $transaksi, 'topup'=>$topup]);
 
    }

    public function detail($id)
    {
        $transaksi = DB::table('transaksi')->where('id_transaksi', $id)->get();
        $foto      = DB::table('usaha')->get();
        return view('admin.detail',['transaksi' => $transaksi, 'foto'=>$foto]);
 
    }

    public function pelapak_upload_file($id)
    {
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        $transaksi = DB::table('transaksi')->where('id_transaksi', $id)->get();
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $transaksi_pelapak = DB::table('transaksi')
        ->join('pengguna', 'transaksi.id_pelanggan','=','pengguna.nama')
        ->where(['id_transaksi'=>$id,'status'=>'1'])->orderBy('id_transaksi', 'DESC')->get();
        $upload = DB::table('upload')
        ->where('id_trx',$id)
        ->get();
        return view('front end.upload_file',['transaksi_pelapak' => $transaksi_pelapak, 
            'upload' => $upload, 'saldo'=>$saldo,'transaksi'=>$transaksi,'pengguna'=>$pengguna]);
 
    }

    public function lihat_transaksi($id)
    {
        $transaksi = DB::table('transaksi')
        ->join('pengguna','transaksi.id_pelapak', '=', 'pengguna.id_pengguna')
        ->select('transaksi.*','pengguna.nama')
        ->where(['transaksi.id_transaksi' => $id, 'status' => '1'])->orderBy('id_pelanggan', 'DESC')->get();
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $htg_transaksi = DB::table('transaksi')->where(['id_transaksi' => $id, 'status' => '1'])->count();
        // dd($transaksi);
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        if ($htg_transaksi > 0) {
            $upload = DB::table('upload')->where('id_trx', $transaksi[0]->id_transaksi)->get();
            $foto      = DB::table('usaha')->where('id_pelapak', $transaksi[0]->id_pelapak)->get();
            return view('front end.transaksi',['transaksi' => $transaksi, 'foto'=>$foto, 'upload' => $upload,'saldo'=>$saldo,'pengguna'=>$pengguna]);
        }
        return redirect()->back();
 
    }

    public function detail_transaksi($id)
    {

    $transaksi = DB::table('transaksi')->select('transaksi.*', 'pengguna.nama')
    ->join('pengguna', 'transaksi.id_pelapak', '=', 'pengguna.id_pengguna')->where(['transaksi.id_pelanggan' => $id, 'transaksi.status' => '1'])->get();
    // dd($transaksi);
    $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
    $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
    // dd($transaksi[0]);
    $senderType = session()->get('level') == 3 ? 'pelapak' : 'pelanggan';
    $notifikasiCounts = $this->notifikasiController->getCountByDestinationId(session()->get('id_pengguna'), $senderType);
    $notifications = $this->notifikasiController->getByDestinationId(session()->get('id_pengguna'), $senderType);
    return view('front end.transaksi_detail',['transaksi'=>$transaksi,'saldo'=>$saldo,'pengguna'=>$pengguna,
    'notifikasiCounts'=>$notifikasiCounts, 'notifications' => $notifications]);
    }

    public function komen($usaha)
    {
         $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
         $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        return view('front end.komen', ['usaha' => $usaha,'saldo'=>$saldo,'pengguna'=>$pengguna]);
    }

     public function komenstore(Request $request)
    {
        \DB::table('komen')->insert([
            'id_usaha'      => $request->usaha,
            'id_pengguna'   => $request->id_pelanggan,
            'komen'         => $request->komen,
            'rating'        => $request->rating,
        ]);
        return redirect('index');
    }
    public function update_status($request,$id)
    {
        $slc = \DB::table('transaksi')->select('id_pelapak', 'id_transaksi', 'harga', 'id_usaha')->where(['id_pelanggan' => session()->get('nama'), 'status' => '1','id_transaksi'=>$id])->orderBy('id_pelanggan', 'DESC')->get();
        if ($request == 2) {
            DB::table('transaksi')->where('id_transaksi', $slc[0]->id_transaksi)->update([
                'status'   => $request
            ]);
            // Pemesan
            $tot_pemesan = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
            $hasil_e = $tot_pemesan + $slc[0]->harga;
            \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->update(['total' => $hasil_e]);
            // Pemilik
            $tot_pemilik = \DB::table('saldo')->where('id_pengguna', $slc[0]->id_pelapak)->value('total');
            $hasil_i = $tot_pemilik - $slc[0]->harga;
            \DB::table('saldo')->where('id_pengguna', $slc[0]->id_pelapak)->update(['total' => $hasil_i]);
        return redirect('index');
        } else {
            DB::table('transaksi')->where('id_transaksi', $slc[0]->id_transaksi)->update([
                'status'   => $request,
                'harga'    => $slc[0]->harga / 30 * 100,
            ]);
            $tagihan_akhir = ($slc[0]->harga / 30 * 100) - $slc[0]->harga;
            // Pemesan
            $tot_pemesan = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
            $hasil_e = $tot_pemesan - $tagihan_akhir;
            \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->update(['total' => $hasil_e]);
            // Pemilik
            $tot_pemilik = \DB::table('saldo')->where('id_pengguna', $slc[0]->id_pelapak)->value('total');
            $hasil_i = $tot_pemilik + $tagihan_akhir;
            \DB::table('saldo')->where('id_pengguna', $slc[0]->id_pelapak)->update(['total' => $hasil_i]);
        return redirect('transaksi/komen/'.$slc[0]->id_usaha);
        }
    }

    public function transaksi_pelapak($id)
    {
        $transaksi = DB::table('transaksi')->where('id_transaksi', $id)->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $htg_transaksi = DB::table('transaksi')->where(['id_pelapak' => $id, 'status' => '1'])->count();
        $transaksi_pelapak = DB::table('transaksi')
        ->join('pengguna', 'transaksi.id_pelanggan','=','pengguna.nama')
        ->where(['id_pelapak'=>$id,'status'=>'1'])->orderBy('id_transaksi', 'DESC')->get();
        if($htg_transaksi>0){
        $upload = DB::table('upload')->get();
        $senderType = session()->get('level') == 3 ? 'pelapak' : 'pelanggan';
        $notifikasiCounts = $this->notifikasiController->getCountByDestinationId(session()->get('id_pengguna'), $senderType);
        $notifications = $this->notifikasiController->getByDestinationId(session()->get('id_pengguna'), $senderType);

        return view('front end.transaksi_pelapak',['transaksi_pelapak' => $transaksi_pelapak, 
            'upload' => $upload, 'saldo'=>$saldo,'transaksi'=>$transaksi,'pengguna'=>$pengguna,
    'notifikasiCounts'=>$notifikasiCounts, 'notifications' => $notifications]);
    }
    return redirect()->back();
 
    }

    public function upload($id)
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $upload = DB::table('upload')->where('id_pelanggan',$id)->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->get();
        return view('front end.upload',['upload'=>$upload,'id_pelanggan'=>$transaksi[0]->id_pelanggan,'id_usaha'=>$transaksi[0]->id_usaha,'id_transaksi'=>$transaksi[0]->id_transaksi,'saldo'=>$saldo,'pengguna'=>$pengguna]);

    }
    public function upload_show($id)
    {
        $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
        $upload_show = DB::table('upload')->where('id_pelanggan',$id)->get();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        return view('front end.transaksi_pelapak',['upload_show'=>$upload_show,'upload'=>$upload,'pengguna'=>$pengguna]);

    }

    public function upload_file(Request $request)
    {
        $idx = 0;
        $file1 = $request->file('foto1');
        $ext1 = $file1->getClientOriginalExtension();
        $newName1 = rand(100000,1001238912).".".$ext1;
        $file1->move('images/usaha',$newName1);
        $idx++;
        if ($request->file('foto2')) {
            $file2 = $request->file('foto2');
            $ext2 = $file2->getClientOriginalExtension();
            $newName2 = rand(100000,1001238912).".".$ext2;
            $file2->move('images/usaha',$newName2);
            $data['foto2']= $newName2;
            $idx++;
        }
        if ($request->file('foto3')) {
            $file3 = $request->file('foto3');
            $ext3 = $file3->getClientOriginalExtension();
            $newName3 = rand(100000,1001238912).".".$ext3;
            $file3->move('images/usaha',$newName3);
            $data['foto3']= $newName3;
            $idx++;
        }
        if ($request->file('foto4')) {
            $file4 = $request->file('foto4');
            $ext4 = $file4->getClientOriginalExtension();
            $newName4 = rand(100000,1001238912).".".$ext4;
            $file4->move('images/usaha',$newName4);
            $data['foto4']= $newName4;
            $idx++;
        }
        if ($request->file('foto5')) {
            $file5 = $request->file('foto5');
            $ext5 = $file2->getClientOriginalExtension();
            $newName5 = rand(100000,1001238912).".".$ext5;
            $file5->move('images/usaha',$newName5);
            $data['foto5']= $newName5;
            $idx++;
        }
        if ($request->file('foto6')) {
            $file6 = $request->file('foto6');
            $ext6 = $file6->getClientOriginalExtension();
            $newName6 = rand(100000,1001238912).".".$ext6;
            $file6->move('images/usaha',$newName6);
            $data['foto6']= $newName6;
            $idx++;
        }
        if ($request->file('foto7')) {
            $file7 = $request->file('foto7');
            $ext7 = $file7->getClientOriginalExtension();
            $newName7 = rand(100000,1001238912).".".$ext7;
            $file7->move('images/usaha',$newName7);
            $data['foto7']= $newName7;
            $idx++;
        }
        if ($request->file('foto8')) {
            $file8 = $request->file('foto8');
            $ext8 = $file8->getClientOriginalExtension();
            $newName8 = rand(100000,1001238912).".".$ext8;
            $file8->move('images/usaha',$newName8);
            $data['foto8']= $newName8;
            $idx++;
        }
        if ($request->file('foto9')) {
            $file9 = $request->file('foto9');
            $ext9 = $file9->getClientOriginalExtension();
            $newName9 = rand(100000,1001238912).".".$ext9;
            $file9->move('images/usaha',$newName9);
            $data['foto9']= $newName9;
            $idx++;
        }
        if ($request->file('foto10')) {   
            $file10 = $request->file('foto10');
            $ext10 = $file10->getClientOriginalExtension();
            $newName10 = rand(100000,1001238912).".".$ext10;
            $file10->move('images/usaha',$newName10);
            $data['foto10']= $newName10;
            $idx++;
        }
        if($idx>=1){
            $data['id_trx']          = $request->id_transaksi;
            $data['id_usaha']          = $request->id_usaha;
            $data['id_pelanggan']      = $request->id_pelanggan;
            $data['foto1']             = $newName1;
            $setelah = DB::table('upload')->insert($data);
        }

        $pengguna = DB::table('pengguna')->where('nama', $request->id_pelanggan)->first();

        $senderType = session()->get('level') == 2 ? 'pelapak' : 'pelanggan';

        DB::table('notifikasi')->insert([
            'sender_type'       => $senderType,
            'sender_id'         =>  session()->get('id_pengguna'),
            'destination_id'    =>  $pengguna ? $pengguna->id_pengguna : 0,
            'message'           => 'Ada upload foto dari '. session()->get('nama'),
            'status'            => 'unread',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        return redirect('transaksi/transaksi_pelapak/'.session()->get('id_pengguna'));
    }
    
    
}
