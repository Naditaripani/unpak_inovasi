<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_kemajuan extends Model
{
    use HasFactory;
    protected $table = 'info_kemajuan';
    protected $fillable = ['id_pribadi','id_pertanyaan','jawaban','keterangan'];


    public function datadosens()
    {
        return $this->belongsTo(DataDosen::class,'id_pribadi', 'id');
    }

    public function pertanyaans()
    {
        return $this->belongsTo(Pertanyaan::class,'id_pertanyaan', 'id');
    }
}
