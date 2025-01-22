<?php

// database/migrations/xxxx_xx_xx_create_anamnesas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamnesasTable extends Migration
{
    public function up()
    {
        Schema::create('anamnesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->text('keluhan_utama');
            $table->text('riwayat_penyakit_sekarang');
            $table->text('riwayat_penyakit_dahulu');
            $table->text('riwayat_alergi_obat');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anamnesas');
    }
}
