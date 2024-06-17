<?php

// database/migrations/{timestamp}_create_materis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('gambar', 255);
            $table->string('file');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materis');
    }
}
