<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ruangan;

class RuanganController extends Controller
{
    
    public function index()
    {
    	$ruangan = Ruangan::all();
    	return view('dashboard', ['tb_ruangan' => $ruangan]);
    }
    public function tambah()
    {
    	return view('tambahruangan');
    }
 
    public function simpantambah(Request $request)
    {
    // insert data ke table pegawai
	    DB::table('tb_ruangan')->insert([
		'id_ruangan' => $request->id_ruangan,
        'namaruangan' => $request->namaruangan,
        'deskripsi' => $request->deskripsi
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/ruangan');
    }

    // method untuk edit data pegawai
    public function edit($id_ruangan)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $ruangan = DB::table('tb_ruangan')->where('id_ruangan',$id_ruangan)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('editruangan',['tb_ruangan' => $ruangan]);
    
    }

    // update data 
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('tb_ruangan')->where('id_ruangan',$request->id_ruangan)->update([
        'id_ruangan' => $request->id_ruangan,
        'namaruangan' => $request->namaruangan,
        'deskripsi' => $request->deskripsi
            
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/ruangan');
    }
		// update data pegawai
		

    public function hapus($id_ruangan)
    {
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('tb_ruangan')->where('id_ruangan',$id_ruangan)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/ruangan');
    }
}

