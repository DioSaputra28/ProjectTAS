<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalKebersihan extends Model
{
    use HasFactory;
    protected $table = 'jurnalKebersihan';
    protected $fillable = [
        'iduser',
        'idjadwal',
        'tanggal',
        'waktu',
        'foto',
        'keterangan',
        'validasi',
    ];
}
