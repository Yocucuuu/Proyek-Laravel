<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePeriodeAjar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajar_mengajar', function (Blueprint $table) {
            $table->increments("Id_ajar_mengajar")->start_from(119000);
            $table->integer('Id_kelas')->unsigned();
            $table->integer('Id_mapel')->unsigned();
            $table->integer('NIG')->unsigned();
            $table->time('Jam_berakhir', $precision = 0);
            $table->time('Jam_dimulai', $precision = 0);
            $table->string('Hari',10);
            $table->time('Jam_belajar', $precision = 0);
            $table->boolean('Status_jadwal');
            $table->date('deleted_at')->nullable();
            $table->foreign('Id_kelas')->references('Id_kelas')->on('kelas');
            $table->foreign('Id_mapel')->references('Id_mapel')->on('mapel');
            $table->foreign('NIG')->references('NIG')->on('guru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ajar_mengajar');
    }
}
