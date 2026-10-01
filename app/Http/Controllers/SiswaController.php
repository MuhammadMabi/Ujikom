<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();

        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.create', compact('kelas', 'spp'));
    }

    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|max:10|unique:siswas,nisn,' . $request->id,
            'nama' => 'required|string|max:50',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:13',
            'id_spp' => 'required|exists:spps,id_spp',
        ]);

        $kelas = Kelas::where('id_kelas', $request->id_kelas)->first();

        if ($request->id) {
            $siswa = Siswa::findOrFail($request->id);

            $siswa->update([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'id_kelas' => $request->id_kelas,
                'nama_kelas' => $kelas->nama_kelas,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'id_spp' => $request->id_spp,
            ]);

            $message = 'Data siswa berhasil diperbarui.';
        } else {
            Siswa::create([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'id_kelas' => $request->id_kelas,
                'nama_kelas' => $kelas->nama_kelas,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'id_spp' => $request->id_spp,
            ]);

            $message = 'Data siswa berhasil ditambahkan.';
        }

        return redirect()->route('siswa.index')->with('success', $message);
    }

    public function edit(int $id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $spp = Spp::all();

        return view('siswa.create', compact('siswa', 'kelas', 'spp'));
    }

    public function delete(int $id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa) {
            $siswa->delete();
        }

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus.');
    }
}
