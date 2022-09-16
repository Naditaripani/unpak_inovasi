<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumber_pendanaan extends Model
{
    use HasFactory;
    protected $table = 'sumber_pendanaan';
    protected $fillable = ['tahun_dana', 'total_dana', 'sumber_dana'];


    // public function datadosens()
    // {
    //     return $this->belongsTo(DataDosen::class,'id_pribadi', 'id');
    // }
}
