<?php

namespace App\Http\Controllers;


use App\Models\pembayaran;
use App\Models\petugas;
use App\Models\siswa;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // petugas
    // utama
    public function utama(){
        $p = new pembayaran();
        
        return view('admin.utama', ['data'=> $p->all()]);
    }
    
    // login
    public function login()
    {
        return view("admin.login");
    }
    public function masuk(Request $request)
    {
        $cek = new petugas();
        $cek = $cek->where('username', $request->input('username'))->where('password', $request->input('password'));
        if ($cek->exists()) {
            session([
                'username' => $request->input('username'),
                'password' => ($request->input('password'))
            ]);
            return redirect('utama');
        }
    }

    //pembayaran
    public function pembayaran()
    {
        return view("admin.pembayaran");
    }
    public function entri(Request $request)
    {
        $tes = $request->validate([
            'id_petugas'=>'required|max:4',
            'nisn'=>'required|max:10',
            'tgl_bayar'=>'required|date',
            'bulan_dibayar'=>'required|max:8',
            'tahun_dibayar'=>'required|max:4',
            'id_spp'=>'required|max:4',
            'jumlah_bayar'=>'required'

        ]);
        $m = new pembayaran();
        $m->create([
        'id_petugas'=>$request->id_petugas,
        'nisn'=>$request->nisn,
        'tgl_bayar'=>$request->tgl_bayar,
        'bulan_dibayar'=>$request->bulan_dibayar    ,
        'tahun_dibayar'=>$request->tahun_dibayar,
        'id_spp'=>$request->id_spp,
        'jumlah_bayar'=>$request->jumlah_bayar
        ]);
        return redirect('pembayaran')->with('pesan','Pembayaran berhasil');
    }
        // logout
    public function logout(){
        session()->flush();
        return redirect('login');
    }
}
