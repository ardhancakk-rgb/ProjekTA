<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanAdopsi extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_adopsi';

    protected $fillable = [
        'user_id',
        'hewan_id',
        'alasan',
        'pengalaman',
        'kondisi_rumah',
        'nomor_telepon',
        'alamat',
        'status',
        'catatan_admin',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hewan(): BelongsTo
    {
        return $this->belongsTo(Hewan::class, 'hewan_id');
    }
}