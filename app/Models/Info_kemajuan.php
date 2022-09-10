<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_kemajuan extends Model
{
    use HasFactory;
    protected $table = 'info_dilaksanakan';
    protected $fillable = ['id_inovator','id_pertanyaan','jawaban','keterangan'];


    public function info_inovator()
    {
        return $this->belongsTo(Info_inovator::class,'id_inovator', 'id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class,'id_pertanyaan', 'id');
    }
}
