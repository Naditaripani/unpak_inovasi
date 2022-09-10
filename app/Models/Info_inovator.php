<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_inovator extends Model
{
    use HasFactory;

    protected $table = 'info_inovator';
    protected $fillable = ['nidn', 'institusi', 'alamat_kontak', 'phone', 'fax'];

    public function mitra()
    {
        return $this->hasMany(Mitra::class, 'id_inovator', 'id');
    }

    public function anggota_tim()
    {
        return $this->hasMany(Anggota_tim::class, 'id_inovator', 'id');
    }

    public function sumber_pendanaan()
    {
        return $this->hasMany(Sumber_pendanaan::class, 'id_inovator', 'id');
    }

    public function foto_produk()
    {
        return $this->hasMany(Foto_produk::class, 'id_inovator', 'id');
    }

    public function info_dilaksanakan()
    {
        return $this->hasMany(Info_dilaksanakan::class, 'id_inovator', 'id');
    }
}

