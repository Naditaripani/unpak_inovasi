<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $fillable = ['id_inovator','nama_mitra', 'alamat_mitra', 'peran_mitra', 'status_kerjasama'];


    public function info_inovator()
    {
        return $this->belongsTo(Info_inovator::class,'id_inovator', 'nidn', 'institusi');
    }
}
