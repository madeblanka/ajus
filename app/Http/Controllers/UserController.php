<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{
  
    public function index()
    {
    	$user = DB::table('tb_user')->get();
    	return view('userdashboard', ['tb_user' => $user]);
    }
    public function tambah()
    {
    	return view('tambahuser');
    }

    public function simpantambah(Request $request)
    {
    // insert data ke table pegawai
	    DB::table('tb_user')->insert([
		'id' => $request->id,
		'username' => $request->username,
        'password' => Hash::make($request->password),
        'nama' => $request->nama,
        'status' => 'Pegawai',
        // 'remember_token' => null
       
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/user');
    }

    // method untuk edit data pegawai
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $user = DB::table('tb_user')->where('id',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edituser',['tb_user' => $user]);
    
    }

    // update data 
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('tb_user')->where('id',$request->id)->update([
            'id' => $request->id,
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'status' => 'Pegawai',
            'remember_token' => 'makoweahj1102931809j'
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/user');
    }
		// update data pegawai
		

    public function hapus($id)
    {
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('tb_user')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/user');
    }
}
