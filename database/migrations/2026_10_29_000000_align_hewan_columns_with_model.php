<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $renamedColumns = [
            'kategori_id' => 'id_kategori',
            'nama' => 'nama_hewan',
            'kondisi_kesehatan' => 'status_kesehatan',
            'status' => 'status_adopsi',
            'gambar' => 'foto',
        ];

        foreach ($renamedColumns as $oldName => $newName) {
            if (Schema::hasColumn('hewan', $oldName) && ! Schema::hasColumn('hewan', $newName)) {
                Schema::table('hewan', function (Blueprint $table) use ($oldName, $newName) {
                    $table->renameColumn($oldName, $newName);
                });
            }
        }
    }

    public function down(): void
    {
        $renamedColumns = [
            'id_kategori' => 'kategori_id',
            'nama_hewan' => 'nama',
            'status_kesehatan' => 'kondisi_kesehatan',
            'status_adopsi' => 'status',
            'foto' => 'gambar',
        ];

        foreach ($renamedColumns as $oldName => $newName) {
            if (Schema::hasColumn('hewan', $oldName) && ! Schema::hasColumn('hewan', $newName)) {
                Schema::table('hewan', function (Blueprint $table) use ($oldName, $newName) {
                    $table->renameColumn($oldName, $newName);
                });
            }
        }
    }
};
