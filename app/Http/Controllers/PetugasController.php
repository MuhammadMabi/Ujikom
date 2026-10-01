<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = User::all();

        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:25|unique:users,username,' . $request->id,
            'nama_petugas' => 'required|string|max:35',
            'level' => 'required|in:admin,petugas',
        ]);

        if ($request->id) {
            if ($request->password) {
                $request->validate([
                    'password' => 'required|string|min:5|confirmed',
                ]);
            }

            $petugas = User::findOrFail($request->id);

            $petugas->update([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'nama_petugas' => $request->nama_petugas,
                'level' => $request->level,
            ]);

            $message = 'Data petugas berhasil diperbarui.';
        } else {
            $request->validate([
                'password' => 'required|string|min:5|confirmed',
            ]);

            User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'nama_petugas' => $request->nama_petugas,
                'level' => $request->level,
            ]);

            $message = 'Data petugas berhasil ditambahkan.';
        }

        return redirect()->route('petugas.index')->with('success', $message);
    }

    public function edit(int $id)
    {
        $petugas = User::findOrFail($id);

        return view('petugas.create', compact('petugas'));
    }

    public function delete(int $id)
    {
        $petugas = User::findOrFail($id);

        if ($petugas) {
            $petugas->delete();
        }

        return redirect()->back()->with('success', 'Data petugas berhasil dihapus.');
    }
}
