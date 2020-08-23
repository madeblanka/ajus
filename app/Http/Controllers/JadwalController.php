<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jadwal;
use PDF;
class JadwalController extends Controller
{
  
    public function index()
    {
    	$jadwal = DB::table('tb_jadwal')->get();
    	return view('jadwaldashboard', ['tb_jadwal' => $jadwal]);
    }
    public function tambah()
    {
    	return view('tambahjadwal');
    }

    public function simpantambah(Request $request)
    {
    // insert data ke table pegawai
	    DB::table('tb_jadwal')->insert([
		'id_jadwal' => $request->id_jadwal,
		'id_barang' =>'001002003004',
		'id_ruangan' => '002003921838',
        'id_user' => $request->id_user,
        'nama' => $request->nama,
		'tanggalpengajuan' => date("Y-m-d h:i:sa"),
        'tanggalpinjaman' => $request->tanggalpinjaman,
        'tanggalselesai' => $request->tanggalselesai,
        'deskripsi' => $request->deskripsi,
        //'namabarang' => $request->namabarang .'|'. namabarang2.'|'. namabarang3.'|'. namabarang4,
        'namabarang' =>  implode(" - ",$request->namabarang),
        'namaruangan' =>$request->namaruangan,
        'jumlah' => implode(" - ",$request->jumlah),
		'status' => "Menunggu"
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/jadwal');
    }

    // method untuk edit data pegawai
    public function edit($id_jadwal)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $jadwal = DB::table('tb_jadwal')->where('id_jadwal',$id_jadwal)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('editjadwal',['tb_jadwal' => $jadwal]);
    
    }

    // update data 
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('tb_jadwal')->where('id_jadwal',$request->id_jadwal)->update([
            'id_jadwal' => $request->id_jadwal,
            'id_barang' => $request->id_barang,
            'id_ruangan' => $request->id_ruangan,
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'tanggalpengajuan' => $request->tanggalpengajuan,
            'tanggalpinjaman' => $request->tanggalpinjaman,
            'tanggalselesai' => $request->tanggalselesai,
            'deskripsi' => $request->deskripsi,
            'namabarang' =>$request->namabarang,
            'status' => $request->status
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/jadwal');
    }
    public function updateadmin(Request $request)
    {
        // update data pegawai
        DB::table('tb_jadwal')->where('id_jadwal',$request->id_jadwal)->update([
            // 'id_jadwal' => $request->id_jadwal,
            // 'id_barang' => $request->id_barang,
            // 'id_ruangan' => $request->id_ruangan,
            // 'id_user' => $request->id_user,
            // 'tanggalpengajuan' => $request->tanggalpengajuan,
            // 'tanggalpinjaman' => $request->tanggalpinjaman,
            // 'tanggalselesai' => $request->tanggalselesai,
            // 'deskripsi' => $request->deskripsi,
            // 'namabarang' =>$request->namabarang,
            'status' => $request->status
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/jadwal');
    }
		// update data pegawai
		

    public function hapus($id_jadwal)
    {
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('tb_jadwal')->where('id_jadwal',$id_jadwal)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/jadwal');
    }
    public function cetak()
    {
        $jadwal = DB::table('tb_jadwal')->get();
        $pdf = PDF::loadview('/printjadwal',['tb_jadwal'=>$jadwal]);
        return $pdf->stream();
    }
}
