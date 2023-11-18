<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Kelas
    public function kelas(){
        $k = new kelas();
        return view ('kelas.index',['data'=>$k->all()]);
    }
    public function tambah_kelas(){
        return view('kelas.tambah');
    }
    public function simpan_kelas(Request $request){
        $tes = $request->validate([
            'nama_kelas'=>'required|max:10',
            'kompetensi_keahlian'=>'required|max:50'
        ]);
        $k = new kelas();
        $k->create([
            'nama_kelas'=>$request->nama_kelas,
            'kompetensi_keahlian'=>$request->kompetensi_keahlian
        ]);
        return back()->with('pesan', 'Selamat, Kelas berhasil ditambahkan');
    }
    public function edit_kelas($id){
        $p = kelas::select('*')->where('id_kelas', $id)->first();
        return view('kelas.editkelas',['data'=> $p]);
    }
    public function ubah_kelas(Request $request, $id){
        $tes = $request->validate([
            'nama_kelas'=>'required|max:10',
            'kompetensi_keahlian'=>'required|max:50'
        ]);
        $p = kelas::where('id_kelas',$id)->update([
            'nama_kelas'=>$request->nama_kelas,
            'kompetensi_keahlian'=>$request->kompetensi_keahlian
        ]);
        return back()->with('pesan', 'Kelas berhasil diupdate');
    }
    public function hapus_kelas($id){
        $p = kelas::where('id_kelas',$id)->delete();
        return back();
    }
}
