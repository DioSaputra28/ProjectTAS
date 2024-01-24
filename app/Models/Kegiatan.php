<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory; 
    protected $table = 'kegiatans';

    protected $fillable = [
        'iduser',
        'tanggal',
        'kegiatan',
        'validasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'id');
    }
}
