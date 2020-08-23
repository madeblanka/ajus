<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pengguna;
class PenggunaController extends Controller
{
  
    public function index()
    {
    	$user = DB::table('tb_user')->get();
    	return view('penggunadashboard', ['tb_user' => $user]);
    }
    public function tambah()
    {
    	return view('tambahuser');
    }

    public function simpantambah(Request $request)
    {
    // insert data ke table pegawai
	    DB::table('tb_user')->insert([
		'id_user' => $request->id_user,
		'id_barang' => $request->id_barang,
		'id_ruangan' => $request->id_ruangan,
        'id_user' => $request->id_user,
		'tanggalpengajuan' => date("Y-m-d h:i:sa"),
        'tanggalpinjaman' => $request->tanggalpinjaman,
		'tanggalselesai' => $request->tanggalselesai,
		'status' => "Menunggu"
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/user');
    }

    // method untuk edit data pegawai
    public function edit($id_user)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $user = DB::table('tb_user')->where('id_user',$id_user)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edituser',['tb_user' => $user]);
    
    }

    // update data 
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('tb_user')->where('id_user',$request->id_user)->update([
            'id_user' => $request->id_user,
            'id_barang' => $request->id_barang,
            'id_ruangan' => $request->id_ruangan,
            'id_user' => $request->id_user,
            'tanggalpengajuan' => $request->tanggalpengajuan,
            'tanggalpinjaman' => $request->tanggalpinjaman,
            'tanggalselesai' => $request->tanggalselesai,
            'status' => $request->status
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/user');
    }
		// update data pegawai
		

    public function hapus($id_user)
    {
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('tb_user')->where('id_user',$id_user)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/user');
    }
}
