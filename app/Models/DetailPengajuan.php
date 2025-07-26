<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPengajuan extends Model
{
    //
    protected $table = 'detail_pengajuan';
    protected $fillable = [
        'pengajuan_id',
        'nama_item',
        'qty',
        'harga',
        'satuan',
    ];
}
