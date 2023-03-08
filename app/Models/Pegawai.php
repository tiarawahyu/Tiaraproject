<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = '_pegawai';
    protected $primaryKey = 'nip';
    // ini incrementing di false karena kalau tidak auth()->user() eror karena primary key nya bukan id
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'unit_kerja',
        'pendidikan',
    ];
}
