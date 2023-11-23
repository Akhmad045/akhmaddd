<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
     // Set Tabel
     protected $table = "pembayaran";
    
     // Set Primary Key
     protected $primaryKey = "id_pembayaran";
     
     // Set Auto Increment
     public $incrementing = "false";
 
     // Set DataType primary key
 
     // Setting kolom yang dapat diisi dengan massal
 
     protected $guarded=[];

     public function siswa(){
        return $this->belongsTo(siswa::class,'nisn');
     }
     public function sis_spp(){
        return $this->belongsTo(siswa::class,'id_spp');
     }
}
