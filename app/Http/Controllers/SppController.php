<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Pembayaran;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::all();

        return view('spp.index', compact('spp'));
    }

    public function create()
    {
        return view('spp.create');
    }

    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'id_spp' => 'required|string|max:11|unique:spps,id_spp,' . $request->id,
            'tahun' => 'required|integer|digits:4',
            'nominal' => 'required|numeric|min:0',
        ]);

        if ($request->id) {
            $spp = Spp::findOrFail($request->id);
            $siswa = Siswa::where('id_spp', $spp->id_spp)->get();
            $pembayaran = Pembayaran::where('id_spp', $spp->id_spp)->get();

            $spp->update([
                'id_spp' => $request->id_spp,
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]);

            foreach ($siswa as $s) {
                $s->update([
                    'id_spp' => $spp->id_spp
                ]);
            }

            foreach ($pembayaran as $p) {
                $p->update([
                    'id_spp' => $spp->id_spp
                ]);
            }

            $message = 'Data spp berhasil diperbarui.';
        } else {
            Spp::create([
                'id_spp' => $request->id_spp,
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]);

            $message = 'Data spp berhasil ditambahkan.';
        }

        return redirect()->route('spp.index')->with('success', $message);
    }

    public function edit(int $id)
    {
        $spp = Spp::findOrFail($id);

        return view('spp.create', compact('spp'));
    }

    public function delete(int $id)
    {
        $spp = Spp::findOrFail($id);
        $siswa = Siswa::where('id_spp', $spp->id_spp)->first();
        $pembayaran = Pembayaran::where('id_spp', $spp->id_spp)->first();

        if ($siswa) {
            return redirect()->back()->with('error', 'Data spp tidak dapat dihapus karena masih digunakan oleh data siswa.');
        }

        if ($pembayaran) {
            return redirect()->back()->with('error', 'Data spp tidak dapat dihapus karena masih digunakan oleh data pembayaran.');
        }

        if ($spp) {
            $spp->delete();
        }

        return redirect()->back()->with('success', 'Data spp berhasil dihapus.');
    }
}
