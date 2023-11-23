<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
     // Set Tabel
     protected $table = "kelas";
    
     // Set Primary Key
     protected $primaryKey = "id_kelas";
     
     // Set Auto Increment
     public $incrementing = "false";
 
     // Set DataType primary key

 
     // Setting kolom yang dapat diisi dengan massal
 
     protected $guarded=[];

     public function siswa(){
        return $this->hasMany(siswa::class, 'id_kelas','id_kelas');
     }
}
