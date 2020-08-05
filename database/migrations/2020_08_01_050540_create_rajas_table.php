<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rajas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kerajaan_id');
            $table->string('Nama_Raja');
            $table->string('Foto_Raja')->nullable();
            $table->string('masa_jabatan');
            $table->text('deskripsi');
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
        Schema::dropIfExists('rajas');
    }
}
