<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalKebersihan extends Model
{
    use HasFactory;

    protected $table = 'jurnalkebersihan';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'iduser',
        'idjadwal',
        'tanggal',
        'waktu',
        'foto',
        'keterangan',
        'validasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
