<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(kelas::class,'id_kelas','id_kelas');
    }
    public function spp(): BelongsTo
    {
        return $this->belongsTo(spp::class,'id_spp','id_spp');
    }
    public function pembayaran(): HasMany
    {
        return $this->hasMany(pembayaran::class,'nisn','nisn');
    }
}
