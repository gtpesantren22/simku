<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    //
    protected $table = 'pencairan';
    protected $fillable = ['pengajuan_id', 'nominal', 'tanggal'];
}
