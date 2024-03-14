<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($materi) {
            $materi->kode_materi = 'IF-' . str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        });
    }
}
