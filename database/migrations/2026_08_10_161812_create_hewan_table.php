<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hewan', function (Blueprint $table) {
            $table->id('id_hewan');

            $table->unsignedBigInteger('id_kategori');

            $table->string('nama_hewan');
            $table->string('jenis');
            $table->string('ras')->nullable();
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['jantan', 'betina']);
            $table->decimal('berat', 5, 2)->nullable();
            $table->string('status_kesehatan')->nullable();
            $table->string('status_vaksin')->nullable();
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();

            $table->enum('status_adopsi', [
                'tersedia',
                'diproses',
                'diadopsi'
            ])->default('tersedia');

            $table->timestamps();

            $table->foreign('id_kategori')
                  ->references('id_kategori')
                  ->on('kategori_hewan')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hewan');
    }
};