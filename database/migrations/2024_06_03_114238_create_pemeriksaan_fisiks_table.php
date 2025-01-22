<?php

// database/migrations/xxxx_xx_xx_create_pemeriksaan_fisiks_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanFisiksTable extends Migration
{
    public function up()
    {
        Schema::create('pemeriksaan_fisiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->string('tensi');
            $table->string('bb');
            $table->string('nadi');
            $table->string('tb');
            $table->string('rr');
            $table->string('suhu');
            $table->text('keadaan_umum');
            $table->text('diagnosa');
            $table->text('terapi');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemeriksaan_fisiks');
    }
}
