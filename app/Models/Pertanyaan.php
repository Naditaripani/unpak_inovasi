<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';
    protected $fillable = ['kategori_id','isi_pertanyaan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function info_kemajuans()
    {
        return $this->hasMany(Info_kemajuan::class, 'id_pribadi', 'id');
    }

    //  protected $guarded = [];
}
