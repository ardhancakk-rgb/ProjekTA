
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan_adopsi', function (Blueprint $table) {
            $table->string('telepon_pemohon')->nullable();
            $table->text('alamat_pemohon')->nullable();
            $table->text('alasan_adopsi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pengajuan_adopsi', function (Blueprint $table) {
            $table->dropColumn([
                'telepon_pemohon',
                'alamat_pemohon',
                'alasan_adopsi',
            ]);
        });
    }
};
