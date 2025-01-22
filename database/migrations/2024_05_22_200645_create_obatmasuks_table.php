<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatmasuksTable extends Migration
{
    public function up()
    {
        Schema::create('obatmasuks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_obat');
            $table->string('nama_obat', 100);
            $table->integer('jumlah_masuk');
            $table->date('tanggal_masuk');
            $table->timestamps();

            $table->foreign('id_obat')->references('id_obat')->on('masterobats')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('obatmasuks');
    }
}
