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
}
