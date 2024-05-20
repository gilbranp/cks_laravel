<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'url',
        'deskripsi',
        'tanggal',
        'foto'
    ];
}
