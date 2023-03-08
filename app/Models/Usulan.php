<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    protected $table = 'table_usulan';
    protected $primaryKey = 'id';
    // ini incrementing di false karena kalau tidak auth()->user() eror karena primary key nya bukan id
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'usulan',
    ];
}
