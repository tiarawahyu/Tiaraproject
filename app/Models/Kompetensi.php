<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    use HasFactory;

    protected $table = 'table_kompetensi';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nip',
        'nama_pelatihan',
        'jenis_pelatihan',
        'waktu',
        'penyelenggara',
        'jumlah_jam',
        'no_sertifikat',
    ];

}
