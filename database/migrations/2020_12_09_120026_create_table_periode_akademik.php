<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePeriodeAkademik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode_akademik', function (Blueprint $table) {
            $table->increments("Id_periode")->start_from(115000);
            $table->string('Tahun_ajaran', 4);
            $table->boolean('Semester');
            $table->boolean('Status');
            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periode_akademik');
    }
}
