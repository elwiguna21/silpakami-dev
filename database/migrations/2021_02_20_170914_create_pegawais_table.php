<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->string('nama_lengkap')->nullable();
            $table->string('temlahir')->nullable();
            $table->string('tgllahir')->nullable();
            $table->string('tmtpang')->nullable();
            $table->string('jenis_jabatan')->nullable();
            $table->string('nama_jabatan')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('gol')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('nama_dudukpeg')->nullable();
            $table->string('kodeunitkerja')->nullable();
            $table->string('unitkerja')->nullable();
            $table->string('jenispek')->nullable();
            $table->string('kode')->nullable();
            $table->string('tkt')->nullable();
            $table->string('kdpang')->nullable();
            $table->string('pinid')->nullable();
            $table->string('tpp')->nullable();
            $table->string('grade')->nullable();
            $table->string('kdu')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
