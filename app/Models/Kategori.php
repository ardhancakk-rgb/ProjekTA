<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori_hewan';

    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function hewan()
    {
        return $this->hasMany(
            Hewan::class,
            'id_kategori',
            'id_kategori'
        );
    }
}
