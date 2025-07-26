<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    //
    protected $table = 'lembaga';
    protected $fillable = ['nama'];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
