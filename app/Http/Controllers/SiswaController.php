<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function siswa()
    {
        $s = new siswa();
        return view("siswa.siswa", ["data"=> $s->all()]);
    }
    public function tambah_siswa(){
        return view("siswa.tambahsiswa");
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
        return view('siswa.editsiswa',['data'=> $p]);
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
