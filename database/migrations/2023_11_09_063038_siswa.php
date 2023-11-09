<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function(Blueprint $table){
            $table->string('nisn',10);
            $table->string('nis',8);
            $table->integer('id_kelas');
            $table->text('alamat');
            $table->string('no_telp',13);
            $table->integer('id_spp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::drop('siswa');
    }
};
