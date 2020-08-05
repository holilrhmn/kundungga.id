<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerajaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerajaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kerajaan');
            $table->text('deskripsi');
            $table->text('pemerintahan');
            $table->text('tradisi_lisan');
            $table->text('adat_istiadat');
            $table->text('ritus');
            $table->text('seni');
            $table->string('slug');
            $table->string('bahasa');
            $table->text('cagar_budaya');
            $table->string('foto');
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
        Schema::dropIfExists('kerajaans');
    }
}
