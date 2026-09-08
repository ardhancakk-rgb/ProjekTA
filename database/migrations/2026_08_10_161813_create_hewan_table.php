<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hewan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnDelete();
            $table->string('nama');
            $table->string('jenis');
            $table->string('ras')->nullable();
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['jantan', 'betina']);
            $table->string('warna')->nullable();
            $table->decimal('berat', 5, 2)->nullable();
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();
            $table->string('kondisi_kesehatan')->nullable();
            $table->string('status_vaksin')->nullable();
            $table->string('gambar')->nullable();
            $table->enum('status', ['tersedia', 'diproses', 'diadopsi'])->default('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewan');
    }
};
