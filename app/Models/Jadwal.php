<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';

    protected $fillable = [
        'idjadwal',
        'iduser',
        'blokruang',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
