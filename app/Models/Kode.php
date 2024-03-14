<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kode extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kode) {
            $randomString = Str::random(10); // Menghasilkan string acak sepanjang 10 karakter
            $kode->kode = $randomString;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function absen()
    {
        return $this->belongsTo(Absen::class);
    }
}
