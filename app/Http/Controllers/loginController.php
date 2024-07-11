<?php

namespace App\Http\Controllers;

use App\ModelPengguna;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function index(Request $request){
        if(!Session::get('login')){
            return redirect('login.login')->with('alert','Kamu harus login dulu');
        }
        else{
            $saldo = \DB::table('saldo')->where('id_pengguna', session()->get('id_pengguna'))->value('total');
            $riwayat_transaksi = DB::table('transaksi')->where('id_transaksi', session()->get('id_pengguna'))->get();
            $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->get();
        	if ($request->filter == '' || $request->kueri == '') {
        		$usaha = \DB::select('SELECT * FROM (SELECT *,case  when total_rating IS NULL then 0 else total_rating END as rating, (SELECT GROUP_CONCAT(nama_wisata) FROM wisatakota WHERE nama_kota=abc.kota) AS nama_wisata FROM (SELECT *,(select Round(AVG(rating),0) from komen where id_usaha=u.nama_usaha) total_rating FROM `usaha` u) abc) cba');
        	} else {
                if ($request->filter != 'nama_wisata') {
                    $like = "SELECT * FROM (SELECT *,case  when total_rating IS NULL then 0 else total_rating END as rating, (SELECT GROUP_CONCAT(nama_wisata) FROM wisatakota WHERE nama_kota=abc.kota) AS nama_wisata FROM (SELECT *,(select Round(AVG(rating),0) from komen where id_usaha=u.nama_usaha) total_rating FROM `usaha` u) abc) cba WHERE UPPER(".$request->filter.") LIKE UPPER('%".$request->kueri."%')";
                } else {
                    $like = "SELECT * FROM (SELECT *,case  when total_rating IS NULL then 0 else total_rating END as rating, (SELECT GROUP_CONCAT(nama_wisata) FROM wisatakota WHERE nama_kota=abc.kota) AS nama_wisata FROM (SELECT *,(select Round(AVG(rating),0) from komen where id_usaha=u.nama_usaha) total_rating FROM `usaha` u) abc) cba WHERE UPPER(".$request->filter.") LIKE UPPER('%".$request->kueri."%')";
                    $usaha1 = \DB::select($like);

                    /*$kota = \DB::table('kota')->where('id', $usaha1[0]->id_kota)->value('nama_kota');
                    $like = "SELECT * FROM (SELECT *,case  when total_rating IS NULL then 0 else total_rating END as rating, (SELECT GROUP_CONCAT(nama_wisata) FROM wisatakota WHERE nama_kota=abc.kota) AS nama_wisata FROM (SELECT *,(select Round(AVG(rating),0) from komen where id_usaha=u.nama_usaha) total_rating FROM `usaha` u) abc) cba WHERE kota LIKE '%".$kota."%'";*/
                }
                $usaha = \DB::select($like);
        	}
			$jumlah_pencarian = count($usaha);
			if($jumlah_pencarian==0){
				Session::put('notif_pencarian', "Pencarian yang anda cari tidak ditemukan");
			}
			else{
				Session::put('notif_pencarian', "hapus");
			}
           return view('front end.index', ['usaha' => $usaha, 'saldo'=>$saldo, 'riwayat_transaksi'=>$riwayat_transaksi,'pengguna'=>$pengguna]);
        }
    }

    public function login(){
        return view('login.login');
    }

    public function loginPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data = ModelPengguna::where('username',$username)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('level',$data->id_level);
                Session::put('id_pengguna',$data->id_pengguna);
                Session::put('login',TRUE);
                if ($data->id_level ==  1) {
                	return redirect('admin');
                } else {
					if($data->id_level==2){
						
        $transaksi_pelapak = DB::table('transaksi')
        ->join('pengguna', 'transaksi.id_pelanggan','=','pengguna.nama')
        ->where(['id_pelapak'=>$data->id_pengguna,'status'=>'1'])->orderBy('id_transaksi', 'DESC')->get();
		$notif = $transaksi_pelapak->count();
		Session::put('jumlah_notif',$notif);
					}
                	return redirect('index');
                }
            }
            else{
                return redirect('/')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('alert','Kamu sudah logout');
    }

    public function register(Request $request){
        return view('login.register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'nama' 		=> 'required|min:4',
            'kota_asal' => 'required|min:4',
            'username' 	=> 'required|min:4|email|unique:pengguna',
            'password' 	=> 'required',
            'id_level' 	=> 'required',
        ]);

        $data =  new ModelPengguna();
        $data->nama = $request->nama;
        $data->kota_asal = $request->kota_asal;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->id_level = $request->id_level;
        $data->save();
        return redirect('/')->with('alert-success','Kamu berhasil Register');
    }
}