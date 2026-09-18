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

    protected $primaryKey = 'id_hewan';

    protected $fillable = [
        'kategori_id',
        'nama',
        'ras',
        'umur',
        'jenis_kelamin',
        'berat',
        'warna',
        'kondisi_kesehatan',
        'status_vaksin',
        'gambar',
        'status',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function pengajuanAdopsi(): HasMany
    {
        return $this->hasMany(PengajuanAdopsi::class, 'id_hewan', 'id_hewan');
    }
}
