<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableKompetensi extends Migration
{
    public function up()
    {
        Schema::create('table_kompetensi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelatihan');
            $table->string('jenis_pelatihan');
            $table->string('waktu');
            $table->string('penyelenggara');
            $table->string('jumlah_jam');
            $table->string('no_sertifikat');
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
        Schema::dropIfExists('table_kompetensi');
    }
}
