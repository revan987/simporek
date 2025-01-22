<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokobatsTable extends Migration
{
    public function up()
    {
        Schema::create('stokobats', function (Blueprint $table) {
            $table->unsignedBigInteger('id_obat')->primary();
            $table->string('nama_obat', 100);
            $table->integer('jumlah_tersedia')->default(0);
            
            $table->foreign('id_obat')->references('id_obat')->on('masterobats')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stokobats');
    }
}
