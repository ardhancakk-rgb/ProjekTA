<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanAdopsi extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_adopsi';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_user',
        'id_hewan',
        'tanggal_pengajuan',
        'status_pengajuan',
        'catatan_admin',
    ];
    protected $casts = [
        'tanggal_pengajuan' => 'date',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user','id');
    }
    public function hewan(): BelongsTo
    {
        return $this->belongsTo(Hewan::class, 'id_hewan','id_hewan');
    }
}