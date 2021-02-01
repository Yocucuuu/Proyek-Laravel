<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrasi', function (Blueprint $table) {
            $table->increments("Id_administrasi")->start_from(111000);
            $table->string('Nama_administrasi', 30);
            $table->string('Username_administrasi', 30);
            $table->string('No_administrasi', 12);
            $table->string('Alamat_administrasi', 50);
            $table->string('Password_admin', 255);
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
        Schema::dropIfExists('administrasi');
    }
}
