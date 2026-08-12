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
        Schema::create('pengajuan_adopsi', function (Blueprint $table) {
            $table->id();
             $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('hewan_id')->constrained('hewan')->cascadeOnDelete();
            $table->text('alasan');
            $table->text('pengalaman')->nullable();
            $table->text('kondisi_rumah')->nullable();
            $table->string('nomor_telepon');
            $table->text('alamat');
            $table->enum('status', ['pending', 'diproses', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_adopsi');
    }
};
