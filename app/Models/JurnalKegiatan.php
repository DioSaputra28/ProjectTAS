<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalKegiatan extends Model
{
    use HasFactory;
    protected $table = 'jurnalkegiatan';

    protected $fillable = [
        'id',
        'iduser',
        'tanggal',
        'kegiatan',
        'validasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
