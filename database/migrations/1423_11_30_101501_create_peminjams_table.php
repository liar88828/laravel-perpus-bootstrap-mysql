<?php

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Petugas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->date('tgl_pinjam');
            $table->timestamps();
            // realational
//            $table->foreign('id_petugas')->references('id')->on('petugas');
//            $table->foreign('id_anggota')->references('id')->on('anggotas');
//            $table->foreign('id_buku')->references('id')->on('bukus');

//            $table->foreignIdFor(Petugas::class, 'id_petugas');
//            $table->foreignIdFor(Anggota::class, 'id_anggota');
//            $table->foreignIdFor(Buku::class, 'id_buku');

            $table->foreignId('id_petugas')->references('id')->on('petugas');
            $table->foreignId('id_anggota')->references('id')->on('anggotas');
            $table->foreignId('id_buku')->references('id')->on('bukus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjams');
    }
};
