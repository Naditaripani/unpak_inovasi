<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota_tim extends Model
{
    use HasFactory;

    protected $table = 'anggota_tim';
    protected $fillable = ['id_inovator','nidn', 'keahlian'];


    public function info_inovator()
    {
        return $this->belongsTo(Info_inovator::class,'id_inovator', 'id');
    }

    public function datadosens()
    {
        return $this->belongsTo(DataDosen::class, 'nidn', 'id');
    }
}
