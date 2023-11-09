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
        Schema::create('petugas', function (Blueprint $table) {
            $table->integer('id_petugas')->autoIncrement();
            $table->string('username',25)->nullable();
            $table->string('password',32)->nullable();
            $table->string('nama_petugas',35)->nullable();
            $table->enum('level',['admin,petugas'])->nullable();
            $table->primary('id_petugas');
            $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('petugas');
    }
};
