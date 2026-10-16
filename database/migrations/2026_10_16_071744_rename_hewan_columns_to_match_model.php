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
        Schema::table('hewan', function (Blueprint $table) {
            $table->renameColumn('kategori_id', 'id_kategori');
            $table->renameColumn('nama', 'nama_hewan');
            $table->renameColumn('kondisi_kesehatan', 'status_kesehatan');
            $table->renameColumn('status', 'status_adopsi');
            $table->renameColumn('gambar', 'foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hewan', function (Blueprint $table) {
            $table->renameColumn('id_kategori', 'kategori_id');
            $table->renameColumn('nama_hewan', 'nama');
            $table->renameColumn('status_kesehatan', 'kondisi_kesehatan');
            $table->renameColumn('status_adopsi', 'status');
            $table->renameColumn('foto', 'gambar');
        });
    }
};
