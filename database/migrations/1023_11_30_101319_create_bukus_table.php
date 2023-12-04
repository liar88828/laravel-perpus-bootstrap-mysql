<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('judul');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->date('tahun');
            $table->integer('jumlah')->default(0);
            $table->string('kategori');
            $table->text('deskripsi')->default('-');
            $table->string('tipe');
            $table->string('img')->default('https://islandpress.org/sites/default/files/default_book_cover_2015.jpg');
//---
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
