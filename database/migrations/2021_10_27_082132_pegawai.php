<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string("nik")->primary();
            $table->string('username');
            $table->string('password');
            $table->string('nama');
            $table->string('alamat');
            $table->foreignId('jabatan_id')->nullable();
            $table->foreignId('departemen_id')->nullable();
            $table->string('no_telp');
            $table->date('tgl_lahir');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
