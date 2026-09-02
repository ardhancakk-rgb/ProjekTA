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
            $table->id('id_pengajuan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_hewan');
            $table->date('tanggal_pengajuan');
            $table->enum('status_pengajuan', [
                'pending',
                'disetujui',
                'ditolak'
            ])->default('pending');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreign('id_hewan')
                ->references('id_hewan')
                ->on('hewan')
                ->cascadeOnDelete();
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
