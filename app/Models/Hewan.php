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
        'id_kategori',
        'nama_hewan',
        'jenis',
        'ras',
        'umur',
        'jenis_kelamin',
        'berat',
        'status_kesehatan',
        'status_vaksin',
        'foto',
        'deskripsi',
        'status_adopsi',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori','id_kategori');
    }

    public function pengajuanAdopsi(): HasMany
    {
        return $this->hasMany(PengajuanAdopsi::class, 'id_hewan', 'id_hewan');
    }
}
