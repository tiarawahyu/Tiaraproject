<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'table_users';
    protected $primaryKey = 'username';
    // ini incrementing di false karena kalau tidak auth()->user() eror karena primary key nya bukan id
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'username',
        'nama',
        'email',
        'gender',
        'level',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}

class Kompetensi extends Authenticatable
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
