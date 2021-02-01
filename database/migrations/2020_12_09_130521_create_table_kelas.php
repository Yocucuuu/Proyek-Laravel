<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments("Id_kelas")->start_from(118000);
            $table->integer('Id_periode')->unsigned();
            $table->integer('NIG')->unsigned();
            $table->string('Nama_kelas',20);
            $table->integer('Tingkat_kelas');
            $table->integer('Id_jurusan')->unsigned();
            $table->date('deleted_at')->nullable();
            $table->foreign('Id_periode')->references('Id_periode')->on('periode_akademik');
            $table->foreign('NIG')->references('NIG')->on('guru');
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
        Schema::dropIfExists('kelas');
    }
}
