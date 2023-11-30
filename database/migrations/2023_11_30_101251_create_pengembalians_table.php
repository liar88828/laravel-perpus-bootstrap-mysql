<?php

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjam;
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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kembali');
            $table->decimal('denda');
            $table->timestamps();
            // relational
//            $table->foreignIdFor(Anggota::class,'id_anggota')->unique()->constrained();
//            $table->foreignIdFor(Petugas::class,'id_petugas')->unique()->constrained();
//            $table->foreignIdFor(Buku::class,'id_buku')->unique()->constrained();
//            $table->foreignIdFor(Peminjam::class,'id_pinjam')->unique()->constrained();
//
//            $table->foreign('id_buku')->references('id')->on('bukus')->onDelete('cascade');
//            $table->foreign('id_pinjam')->references('id')->on('peminjams')->onDelete('cascade');
//            $table->foreign('id_petugas')->references('id')->on('petugas')->onDelete('cascade');
//            $table->foreign('id_anggota')->references('id')->on('anggotas')->onDelete('cascade');
//
//            $table->foreignIdFor(Petugas::class, 'id_petugas');
//            $table->foreignIdFor(Anggota::class, 'id_anggota');
//            $table->foreignIdFor(Buku::class, 'id_buku');
//            $table->foreignIdFor(Peminjam::class, 'id_pinjam');
//
            $table->foreignId('id_buku')->references('id')->on('bukus');
            $table->foreignId('id_pinjam')->references('id')->on('peminjams');
            $table->foreignId('id_petugas')->references('id')->on('petugas');
            $table->foreignId('id_anggota')->references('id')->on('anggotas');
//            //

//            $table->foreignId('petugas_id')->constrained();
//            $table->foreignId('bukus_id')->constrained();
//            $table->foreignId('peminjams_id')->constrained();
//            $table->foreignId('anggotas_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
