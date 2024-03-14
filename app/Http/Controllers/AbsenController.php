<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Kode;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function store(Request $request)
    {

        // Validasi input kode
        $request->validate([
            'kode' => 'required|string',
            'kelas' => 'required',
            'nama_materi' => 'required'
        ]);

        // Ambil kode berdasarkan kode yang dimasukkan pengguna
        $kode = Kode::where('kode', $request->kode)->first();

        if ($kode && $kode->status == 'belum dipakai') {
            // Ubah status kode menjadi "terpakai"
            $kode->status = 'terpakai';
            $kode->save();

            $waktuMulai = Carbon::now()->format('Y-m-d H:i:s');;

            // Simpan informasi absensi ke dalam tabel absensi
            Absen::create([
                'user_id' => auth()->user()->id,
                'kode_id' => $kode->id,
                'waktu_mulai' => $waktuMulai,
                'kelas' => $request->kelas,
                'nama_materi' => $request->nama_materi
            ]);

            return redirect('/dashboard')->with('success', 'Berhasil absen.');
        } else {
            return redirect('/dashboard')->with('error', 'Kode tidak valid atau sudah terpakai.');
        }
    }
}
