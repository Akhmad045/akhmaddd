<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa;
use App\Models\spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function siswa()
    {
        $s = new siswa();
        return view("siswa.siswa", ["data"=> $s->with('kelas')->with('spp')->get()]);
    }
    public function tambah_siswa(){
        $s = new kelas();
        $p = new spp();
        return view("siswa.tambahsiswa",['data'=>$s->all(),'dataspp'=>$p->all()]);
    }
    public function simpan_siswa(Request $request){
        
        $cek = $request->validate([
            'nisn' => 'required|max:10',
            'nis' => 'required|max:8',
            'nama' => 'required|max:36',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'id_spp' => 'required'
        ]);
        $m = new siswa();
        $m->create($request->all());
        return back()->with('pesan','Selamat, Siswa berhasil ditambahkan');
    }
    public function edit_siswa($id){
        $p = siswa::select('*')->where('nisn', $id)->first();
        $k = new kelas();
        $s = new spp();
        
        return view('siswa.editsiswa',['data'=> $p, 'datakelas'=>$k->all(), 'dataspp'=>$s->all()]);
    }
    public function ubah_siswa(Request $request, $id){
        $tes = $request->validate([
            'nisn' => 'required|max:10',
            'nis' => 'required|max:8',
            'nama' => 'required|max:36',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'id_spp' => 'required'
        ]);
        $p = siswa::where('nisn',$id)->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp
        ]);
        return back()->with('pesan', 'Siswa berhasil diupdate');
    }
    public function hapus_siswa($id){
        $p = siswa::where('nisn',$id)->delete();
        return back();
    }
}
