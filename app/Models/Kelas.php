<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($kode) {
            $kode->kode_ruangan = 'FT-' . str_pad(random_int(0, 999), 3, '0', STR_PAD_LEFT);
        });
    }
}
