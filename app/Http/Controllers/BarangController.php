<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Barang;
class BarangController extends Controller
{

    public function index()
    {
    	$barang = DB::table('tb_barang')->get();
    	return view('barangdashboard', ['tb_barang' => $barang]);
    }
    public function tambah()
    {
    	return view('tambahbarang');
    }

    public function simpantambah(Request $request)
    {
    // insert data ke table pegawai
	    DB::table('tb_barang')->insert([
		'id_barang' => $request->id_barang,
		'nama' => $request->nama,
		'deskripsi' => $request->deskripsi
        
    ]);
    
	// alihkan halaman ke halaman pegawai
	return redirect('/barang');
    }

    // method untuk edit data pegawai
    public function edit($id_barang)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $barang = DB::table('tb_barang')->where('id_barang',$id_barang)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('editbarang',['tb_barang' => $barang]);
    
    }

    // update data 
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('tb_barang')->where('id_barang',$request->id_barang)->update([
            'id_barang' => $request->id_barang,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi    
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/barang');
    }
		// update data pegawai
		

    public function hapus($id_barang)
    {
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('tb_barang')->where('id_barang',$id_barang)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/barang');
    }
}
