<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kode;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'users' => [auth()->user()],
            'kelas' => Kelas::all(),
            'materis' => Materi::all(),
            'codes' => Kode::where('status', 'belum dipakai')->get()
        ]);
    }
}
