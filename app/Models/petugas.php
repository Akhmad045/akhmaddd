<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class petugas extends Model
{
    use HasFactory;
     // Set Tabel
     protected $table = "petugas";
    
     // Set Primary Key
     protected $primaryKey = "id_petugas";
     
     // Set Auto Increment
     public $incrementing = "false";
 
     // Set DataType primary key
    
 
     // Setting kolom yang dapat diisi dengan massal
 
     protected $guarded=[];

     public function pembayaran(): HasMany
     {
        return $this->hasMany(pembayaran::class,'id_petugas','id_petugas');
     }
}
