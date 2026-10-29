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
        if (Schema::hasTable('kategori') && ! Schema::hasTable('kategori_hewan')) {
            Schema::rename('kategori', 'kategori_hewan');
        }

        if (Schema::hasTable('kategori_hewan')
            && Schema::hasColumn('kategori_hewan', 'id')
            && ! Schema::hasColumn('kategori_hewan', 'id_kategori')) {
            Schema::table('kategori_hewan', function (Blueprint $table) {
                $table->renameColumn('id', 'id_kategori');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('kategori_hewan')
            && Schema::hasColumn('kategori_hewan', 'id_kategori')
            && ! Schema::hasColumn('kategori_hewan', 'id')) {
            Schema::table('kategori_hewan', function (Blueprint $table) {
                $table->renameColumn('id_kategori', 'id');
            });
        }

        if (Schema::hasTable('kategori_hewan') && ! Schema::hasTable('kategori')) {
            Schema::rename('kategori_hewan', 'kategori');
        }
    }
};
