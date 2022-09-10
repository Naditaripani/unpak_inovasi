<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_produk extends Model
{
    use HasFactory;
    protected $table = 'foto_produk';
    protected $fillable = ['id_inovator','foto'];


    public function datadosen()
    {
        return $this->belongsTo(DataDosen::class,'id_pribadi', 'id');
    }
}

