<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\pembayaran;
use App\Models\petugas;
use App\Models\siswa;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // petugas
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
        return redirect('petugas');
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

    // utama
    public function utama(){
        $p = new pembayaran();
        
        return view('admin.utama', ['data'=> $p->all()]);
    }


    // profil
    public function profil(){
        $user = Auth::user();
        $username = $user->username;
        return view('admin.utama',['username' => $username]);
    }

    // Siswa
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
        $m->create([
            'nisn'=>$request->nisn,
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'id_kelas'=>$request->id_kelas,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
            'id_spp'=>$request->id_spp
        ]);
        return redirect('tambah/siswa')->with('pesan','Selamat, Siswa berhasil ditambahkan');
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
        $p = kelas::select('*')->where('id_kelas', $id)->get();
        return view('kelas.edit',['data'=> $p]);
    }
    public function ubah_kelas(Request $request){
        $p = kelas::where('id_kelas',$request->id_kelas)->update([
            'nama_kelas'=>$request->nama_kelas,
            'kompetensi_keahlian'=>$request->kompetensi_keahlian
        ]);
        return redirect('kelas');
    }
    public function hapus_kelas(){
         
    }
    // logout
    public function logout(){
        session()->flush();
        return redirect('login');
    }
}
