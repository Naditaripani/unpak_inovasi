<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumber_pendanaan extends Model
{
    use HasFactory;
    protected $table = 'sumber_pendanaan';
    protected $fillable = ['id_inovator','tahun_dana', 'total_dana', 'sumber_dana'];


    public function info_inovator()
    {
        return $this->belongsTo(Info_inovator::class,'id_inovator', 'id');
    }
}
