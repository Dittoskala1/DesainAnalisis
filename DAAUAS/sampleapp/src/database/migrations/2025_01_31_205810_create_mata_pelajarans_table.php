<?php
// database/migrations/2025_01_31_205810_create_mata_pelajarans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataPelajaransTable extends Migration
{
    public function up()
    {
        Schema::create('mata_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');          // Kolom nama mata pelajaran
            $table->text('deskripsi');       // Kolom deskripsi mata pelajaran
            $table->string('file_url');      // Kolom URL untuk materi
            $table->timestamps();           // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('mata_pelajarans');
    }
}
