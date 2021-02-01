<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments("NIS")->start_from(113000);
            $table->string('Nama_siswa',30);
            $table->string('Password_siswa',255);
            $table->string('Tempat_lahir_siswa',20);
            $table->date('Tanggal_lahir_siswa');
            $table->string('Email_siswa',255);
            $table->string('Nama_ibu',30);
            $table->string('Nama_ayah',30);
            $table->boolean('Status');
            $table->integer('NISN');
            $table->string('Agama',10);
            $table->string('Jenis_kelamin',10);
            $table->string('Alamat_siswa',255);
            $table->integer('Id_kelas')->unsigned();
            $table->integer('Id_jurusan')->unsigned();
            $table->date('deleted_at')->nullable();
            $table->foreign('Id_kelas')->references('Id_kelas')->on('kelas');
            $table->foreign('Id_jurusan')->references('Id_jurusan')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
