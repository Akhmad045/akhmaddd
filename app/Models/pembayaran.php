<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

     public function siswa(): BelongsTo
     {
        return $this->belongsTo(siswa::class,'nisn', 'nisn');
     }
     public function spp(): BelongsTo
     {
        return $this->belongsTo(siswa::class,'id_spp', 'id_spp');
     }
     public function petugas(): BelongsTo
     {
      return $this->belongsTo(petugas::class,'id_petugas','id_petugas');
     }
}
