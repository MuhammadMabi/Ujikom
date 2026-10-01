<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\CekPembayaran;
use App\Models\Siswa;
use App\Models\Spp;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('pembayaran.create', compact('siswa', 'spp'));
    }

    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'status' => 'required|string|in:Belum Lunas,Sudah Lunas',
            'nisn' => 'required|string|max:10|exists:siswas,nisn',
            'tgl_bayar' => 'required|date',
            'tgl_terakhir_bayar' => 'required|date',
            'batas_pembayaran' => 'required|date',
            'jumlah_bulan' => 'required|integer|min:1',
            'id_spp' => 'required|exists:spps,id_spp',
            'nominal_bayar' => 'required|numeric|min:0',
            'jumlah_bayar' => 'required|numeric|min:0',
            'kembalian' => 'required|numeric|min:0',
        ]);

        $siswa = Siswa::where('nisn', $request->nisn)->first();

        if ($request->id) {
            $pembayaran = Pembayaran::findOrFail($request->id);

            $pembayaran->update([
                'status' => $request->status,
                'nisn' => $request->nisn,
                'tgl_bayar' => $request->tgl_bayar,
                'tgl_terakhir_bayar' => $request->tgl_terakhir_bayar,
                'batas_pembayaran' => $request->batas_pembayaran,
                'jumlah_bulan' => $request->jumlah_bulan,
                'id_spp' => $request->id_spp,
                'nominal_bayar' => $request->nominal_bayar,
                'jumlah_bayar' => $request->jumlah_bayar,
                'kembalian' => $request->kembalian,
            ]);

            $cekPembayaran = CekPembayaran::where('id_pembayaran', $pembayaran->id)->first();

            $cekPembayaran->update([
                'nisn' => $request->nisn,
                'tgl_terakhir_bayar' => $request->tgl_terakhir_bayar,
                'tgl_sekarang' => now(),
                'status_pembayaran' => $request->status,
                'jumlah_bulan' => $request->jumlah_bulan,
                'nama' => $siswa->nama,
                'no_telp' => $siswa->no_telp,
            ]);

            $message = 'Data pembayaran berhasil diperbarui.';
        } else {
            $pembayaran = Pembayaran::create([
                'status' => $request->status,
                'nisn' => $request->nisn,
                'tgl_bayar' => $request->tgl_bayar,
                'tgl_terakhir_bayar' => $request->tgl_terakhir_bayar,
                'batas_pembayaran' => $request->batas_pembayaran,
                'jumlah_bulan' => $request->jumlah_bulan,
                'id_spp' => $request->id_spp,
                'nominal_bayar' => $request->nominal_bayar,
                'jumlah_bayar' => $request->jumlah_bayar,
                'kembalian' => $request->kembalian,
            ]);

            CekPembayaran::create([
                'id_pembayaran' => $pembayaran->id,
                'nisn' => $request->nisn,
                'tgl_terakhir_bayar' => $request->tgl_terakhir_bayar,
                'tgl_sekarang' => now(),
                'status_pembayaran' => $request->status,
                'jumlah_bulan' => $request->jumlah_bulan,
                'nama' => $siswa->nama,
                'no_telp' => $siswa->no_telp,
            ]);

            $message = 'Data pembayaran berhasil ditambahkan.';
        }

        return redirect()->route('pembayaran.index')->with('success', $message);
    }

    public function edit(int $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $siswa = Siswa::all();
        $spp = Spp::all();

        return view('pembayaran.create', compact('pembayaran', 'siswa', 'spp'));
    }

    public function delete(int $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $cekpembayaran = CekPembayaran::where('id_pembayaran', $pembayaran->id)->first();

        if ($cekpembayaran) {
            $cekpembayaran->delete();
        }

        if ($pembayaran) {
            $pembayaran->delete();
        }

        return redirect()->back()->with('success', 'Data pembayaran berhasil dihapus.');
    }
}
