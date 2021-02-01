<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel', function (Blueprint $table) {
            $table->increments('Id_mapel')->start_from(114000);
            $table->string('Nama_mapel',20);
            $table->integer('KKM');
            $table->integer('Tingkat');
            $table->integer('id_jurusan')->unsigned();
            $table->date('deleted_at')->nullable();
            $table->foreign('id_jurusan')->references('Id_jurusan')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel');
    }
}
