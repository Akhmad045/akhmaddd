<?php

namespace App\Http\Controllers;

use App\Models\spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    //SPP
    public function spp(){
        $k = new spp();
        return view ('spp.spp',['data'=>$k->all()]);
    }
    public function tambah_spp(){
        return view('spp.tambahspp');
    }
    public function simpan_spp(Request $request){
        $tes = $request->validate([
            'tahun'=>'required|',
            'nominal'=>'required|'
        ]);
        $k = new spp();
        $k->create([
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal
        ]);
        return back()->with('pesan', 'Selamat, SPP berhasil ditambahkan');
    }
    public function edit_spp($id){
        $p = spp::select('*')->where('id_spp', $id)->first();
        return view('spp.editspp',['data'=> $p]);
    }
    public function ubah_spp(Request $request, $id){
        $tes = $request->validate([
            'tahun'=>'required|',
            'nominal'=>'required|'
        ]);
        $p = spp::where('id_spp',$id)->update([
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal
        ]);
        return back()->with('pesan', 'SPP berhasil diupdate');
    }
    public function hapus_spp($id){
        $p = spp::where('id_spp',$id)->delete();
        return back();
    }

}
