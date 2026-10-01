<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();

        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|string|max:11|unique:kelas,id_kelas,' . $request->id,
            'nama_kelas' => 'required|string|max:10',
            'komp_keahlian' => 'required|string|max:50',
        ]);

        if ($request->id) {
            $kelas = Kelas::findOrFail($request->id);
            $siswa = Siswa::where('id_kelas', $kelas->id_kelas)->get();

            $kelas->update([
                'id_kelas' => $request->id_kelas,
                'nama_kelas' => $request->nama_kelas,
                'komp_keahlian' => $request->komp_keahlian,
            ]);

            foreach ($siswa as $s) {
                $s->update([
                    'id_kelas' => $kelas->id_kelas,
                    'nama_kelas' => $kelas->nama_kelas,
                ]);
            }

            $message = 'Data kelas berhasil diperbarui.';
        } else {
            Kelas::create([
                'id_kelas' => $request->id_kelas,
                'nama_kelas' => $request->nama_kelas,
                'komp_keahlian' => $request->komp_keahlian,
            ]);

            $message = 'Data kelas berhasil ditambahkan.';
        }

        return redirect()->route('kelas.index')->with('success', $message);
    }

    public function edit(int $id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelas.create', compact('kelas'));
    }

    public function delete(int $id)
    {
        $kelas = Kelas::findOrFail($id);
        $siswa = Siswa::where('id_kelas', $kelas->id_kelas)->first();

        if ($siswa) {
            return redirect()->back()->with('error', 'Data kelas sedang digunakan.');
        }

        if ($kelas) {
            $kelas->delete();
        }

        return redirect()->back()->with('success', 'Data kelas berhasil dihapus.');
    }
}
