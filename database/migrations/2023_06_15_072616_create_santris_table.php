<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_santri');
            $table->integer('nisn');
            $table->integer('nik');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->integer('tanggal_lahir');
            $table->string('alamat_lengkap');
            $table->integer('tahun_lulus');
            $table->string('nama_wali');
            $table->integer('nik_wali');
            $table->string('alamat_wali');
            $table->string('pekerjaan_wali');
            $table->integer('nomor_telepon');
            $table->string('id_sekolah');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santris');
    }
};
