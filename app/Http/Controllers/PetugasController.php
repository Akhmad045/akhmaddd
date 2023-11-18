<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function petugas()
    {
        $p = new Petugas();
        return view("petugas.datapetugas", ['data' => $p->all()]);
    }
    public function edit($id){
        $p = petugas::select('*')->where('id_petugas', $id)->get();
        return view('petugas.edit',['data'=> $p]);
    }
    public function ubah(Request $request){
        $p = petugas::where('id_petugas',$request->id_petugas)->update([
            'username'=>$request->username,
            'password'=>$request->password,
            'nama_petugas'=> $request->nama_petugas,
            'level'=> $request->level
        ]);
        return back()->with('pesan','Petugas berhasil diupdate');
    }
    public function hapus($id){
        $p = petugas::where('id_petugas',$id)->delete();
        return back();
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
    public function tambah()
    {
        return view("petugas.tambah");
    }
}
