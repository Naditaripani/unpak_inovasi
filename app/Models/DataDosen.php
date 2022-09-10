<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDosen extends Model
{
    use HasFactory;

    // protected $table = 'dosen';
    // protected $fillable = ['id_pribadi','nidn', 'kode_prodi'];

    protected $table = 'e_pribadi';
    protected $fillable = ['nip','nidn','nama','tempat_lahir','tgl_lahir','jk','agama','status_perkawinan','no_ktp','alamat','no_tlp','email','tgl_masuk','file_foto','email2','sinta','matkul'];

    public function users()
    {
        return $this->hasMany(User::class, 'nidn', 'id');
    }

    public function anggota_tims()
    {
        return $this->hasMany(Anggota_tim::class, 'nidn', 'id');
    }

    public function info_dilaksanakan()
    {
        return $this->hasMany( Info_dilaksanakan::class, 'id_pribadi', 'id');
    }
}