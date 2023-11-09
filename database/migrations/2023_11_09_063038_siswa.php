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
            $table->string('nis',8)->nullable();
            $table->integer('id_kelas')->nullable();
            $table->text('alamat')->nullable();
            $table->varchar('no_telp',13)->nullable();
            $table->integer('id_spp')->nullable();
            $table->primary('nisn');
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
