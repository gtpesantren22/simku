<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{

    protected $table = 'pemasukan';

    protected $fillable = [
        'uraian',
        'nominal',
        'tanggal',
        'tahun',
        'penerima',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'nominal' => 'float'
    ];
}
