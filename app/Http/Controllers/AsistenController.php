<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AsistenController extends Controller
{
    public function index()
    {
        return view('dashboard.asistens.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.asistens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'roles' => 'required',
        ]);

        // Menambahkan password ke dalam data sebelum menyimpan
        $data = $request->all();
        $data['password'] = bcrypt('12345');

        User::create($data);

        return redirect('/dashboard/datausers')->with('success', 'Data Berhasil Di Input');
    }

    public function  edit($id)
    {
        $user = User::find($id);
        return view('dashboard.asistens.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'roles' => 'required',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect('/dashboard/datausers')->with('success', 'Data Berhasil Di Update');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/dashboard/datausers')->with('success', 'Data Berhasil Dihapus');
    }
}
