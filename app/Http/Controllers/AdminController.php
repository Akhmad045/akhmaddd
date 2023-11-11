<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Models\petugas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function petugas()
    {
        $p = new Petugas();
        return view("admin.datapetugas", ['data' => $p->all()]);
    }
    public function utama(){
        $p = new pembayaran();
        return view('admin.utama', ['data'=> $p->all()]);
    }
    public function tambah()
    {
        return view("admin.tambah");
    }
    public function siswa()
    {
        return view("admin.siswa");
    }
    public function login()
    {
        return view("admin.login");
    }
    public function pembayaran()
    {
        return view("admin.pembayaran");
    }
    public function simpan(Request $request)
    {
        $m = new petugas();
        $cek = $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:4',
            'nama_petugas' => 'required|max:16'
        ]);
        $m->create($request->all());
        if ($m->where('username', $request->input('username'))->where('password', $request->input('password'))->exists()) {
            return redirect('tambah')->with('pesan', 'Selamat, petugas berhasil ditambahkan');
        }
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
    public function logout(){
        session()->flush();
        return redirect('login');
    }
}
