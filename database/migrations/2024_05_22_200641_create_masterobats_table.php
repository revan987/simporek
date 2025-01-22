<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterobatsTable extends Migration
{
    public function up()
    {
        Schema::create('masterobats', function (Blueprint $table) {
            $table->id('id_obat');
            $table->string('nama_obat', 100)->nullable(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('masterobats');
    }
}
