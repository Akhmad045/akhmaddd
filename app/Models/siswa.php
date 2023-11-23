<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
     // Set Tabel
     protected $table = "siswa";
    
     // Set Primary Key
     protected $primaryKey = "nisn";
     
     // Set Auto Increment
     public $incrementing = "false";
 
     // Set DataType primary key
     protected $keyType = 'string';
 
     // Setting kolom yang dapat diisi dengan massal
 
     protected $guarded=[];

    public function kelas()
    {
        return $this->belongsTo(kelas::class,'id_kelas','id_kelas');
    }
    public function spp()
    {
        return $this->belongsTo(spp::class,'id_spp','id_spp');
    }
    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class,'nisn','nisn');
    }
    public function pem_spp(){
        return $this->belongsTo(pembayaran::class,'id_spp');
    }
}
