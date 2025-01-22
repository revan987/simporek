<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatkeluarsTable extends Migration
{
    public function up()
    {
        Schema::create('obatkeluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_obat');
            $table->string('nama_obat', 100);
            $table->integer('jumlah_keluar');
            $table->date('tanggal_keluar');
            $table->timestamps();
        
            // Definisikan foreign key
            $table->foreign('id_obat')->references('id_obat')->on('masterobats')->onDelete('cascade');
        });        
    }

    public function down()
    {
        Schema::dropIfExists('obatkeluars');
    }
}
