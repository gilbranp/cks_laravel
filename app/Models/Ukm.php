<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kategori_id',
        'slug',
        'url',
        'deskripsi',
        'tanggal',
        'foto'
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
