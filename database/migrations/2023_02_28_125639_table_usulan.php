<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableUsulan extends Migration
{
    public function up()
    {
        Schema::create('table_usulan', function (Blueprint $table) {
            $table->id();
            $table->string('usulan');
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
        Schema::dropIfExists('table_usulan');
    }
}
