<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nama_prodi', 'kode_prodi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
