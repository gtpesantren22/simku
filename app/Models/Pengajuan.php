<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    public $incrementing = false; // karena bukan auto-increment
    protected $keyType = 'string'; // UUID adalah string

    protected $fillable = [
        'no',
        'tanggal',
        'status',
        'lembaga_id',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
