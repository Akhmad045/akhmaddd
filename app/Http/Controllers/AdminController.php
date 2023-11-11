<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function petugas(){
        $p = new Petugas();
        return view("admin.datapetugas",['data' =>$p->all()]);
    }
    public function tambah(){
        return view("admin.tambah");
    }
    public function siswa(){
        return view("admin.siswa");
    }
    public function login(){
        return view("admin.login");
    }
    public function simpan(Request $request){
        $m = new petugas();
        $cek = $request->validate([
            'username'=>'required|min:6',
            'password'=>'required|min:4',
            'nama_petugas'=>'required|max:16'
        ]);
        $m->create($request->all());
        if ($m->where('username',$request->input('username'))->where('password',$request->input('password'))->exists()){
            return redirect('tambah')->with('pesan','Selamat, petugas berhasil ditambahkan');
        }
    }
    public function masuk(Request $request){
        $cek = new petugas();
        $cek = $cek->where('username',$request->input('username'))->where('password',$request->input('password'));
        if($cek->exists()){
            session([
                'username'=>$request->input('username'),
                'password'=>($request->input('password'))
            ]);
            return redirect('/');
    }
}
}
