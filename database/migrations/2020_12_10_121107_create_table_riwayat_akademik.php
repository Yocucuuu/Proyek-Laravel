<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRiwayatAkademik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_akademik', function (Blueprint $table) {
            $table->increments("Id_riwayat_akademik")->start_from(120000);
            $table->integer('Id_ajar_mengajar')->unsigned();
            $table->integer('NIS')->unsigned();
            $table->integer('Id_kelas')->unsigned();
            $table->integer('Id_mapel')->unsigned();
            $table->integer('Quiz1')->nullable();
            $table->integer('Quiz2')->nullable();
            $table->integer('Tugas1')->nullable();
            $table->integer('Tugas2')->nullable();
            $table->integer('UTS')->nullable();
            $table->integer('UAS')->nullable();
            $table->string('Sikap',1)->nullable();
            $table->integer('Hasil_akhir')->nullable();
            $table->date('deleted_at')->nullable();

            $table->foreign('Id_ajar_mengajar')->references('Id_ajar_mengajar')->on('ajar_mengajar');
            $table->foreign('Id_kelas')->references('Id_kelas')->on('kelas');
            $table->foreign('Id_mapel')->references('Id_mapel')->on('mapel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_akademik');
    }
}
