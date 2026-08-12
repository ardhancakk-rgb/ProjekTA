<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hewan extends Model
{
    use HasFactory;

    protected $table = 'hewan';

    protected $fillable = [
        'kategori_id',
        'nama',
        'jenis_kelamin',
        'usia',
        'deskripsi',
        'foto',
        'warna',
        'ras',
        'berat',
        'lokasi',
        'kondisi_kesehatan',
        'status_vaksin',
        'status',
        'jenis',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pengajuanAdopsi(): HasMany
    {
        return $this->hasMany(PengajuanAdopsi::class, 'hewan_id');
    }
}
