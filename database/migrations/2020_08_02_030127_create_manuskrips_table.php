<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManuskripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuskrips', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('kerajaan_id');
            $table->string('file_manuskrip')->nullable();
            $table->string('foto');
            $table->text('deskripsi');
            $table->string('sumber');
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
        Schema::dropIfExists('manuskrips');
    }
}
