<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spj extends Model
{
    //
    protected $table = 'spj';
    protected $fillable = ['pengajuan_id', 'nama_file'];
}
