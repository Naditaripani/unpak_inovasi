<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_dilaksanakan extends Model
{
    use HasFactory;

    protected $table = 'info_dilaksanakan';
    protected $fillable = ['id_pribadi','judul_inovator','jenis','bidang','sub_judul','nama_program','manfaat','lama_program','berjalan_tahun_sedang','ringkasan_inovasi','kebaruan','keunggulan'];


    public function datadosen()
    {
        return $this->belongsTo(Datadosen::class,'id_pribadi', 'id');
    }

   
}

