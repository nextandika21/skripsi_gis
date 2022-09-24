<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMadrasahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('madrasahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_madrasah');
            $table->string('jenis_madrasah');
            $table->string('alamat');
            $table->string('akreditasi');
            $table->string('npsn');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('photo');
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
        Schema::dropIfExists('madrasahs');
    }
}
