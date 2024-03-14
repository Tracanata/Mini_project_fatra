<?php

namespace App\Http\Controllers;

use App\Models\Kode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KodeController extends Controller
{

    public function store(Request $request)
    {
        $kode = Str::random(10);
        $user_id = auth()->user()->id;
        $status = 'belum dipakai';

        Kode::create([
            'kode' => $kode,
            'user_id' => $user_id,
            'status' => $status
        ]);

        return redirect('/dashboard')->with('success', 'Data Berhasil Di Input');
    }
}
