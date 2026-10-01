<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CekPembayaran;

class CekPembayaranController extends Controller
{
    public function index()
    {
        $nisn = '';
        $nama = '';
        $search = false;
        
        $belumLunas = CekPembayaran::where('status_pembayaran', 'Belum Lunas')->get();
        $sudahLunas = CekPembayaran::where('status_pembayaran', 'Sudah Lunas')->get();
        $cekPembayaran = CekPembayaran::all();

        return view('cekpembayaran.index', compact('belumLunas', 'sudahLunas', 'cekPembayaran', 'nisn', 'nama', 'search'));
    }

    public function search(Request $request)
    {
        $nisn = $request->input('nisn');
        $nama = $request->input('nama');
        $search = true;

        $belumLunas = CekPembayaran::where('status_pembayaran', 'Belum Lunas')->get();
        $sudahLunas = CekPembayaran::where('status_pembayaran', 'Sudah Lunas')->get();
        $cekPembayaran = CekPembayaran::where('nisn', 'like', '%' . $nisn . '%')
            ->where('nama', 'like', '%' . $nama . '%')
            ->get();

        return view('cekpembayaran.index', compact('belumLunas', 'sudahLunas', 'cekPembayaran', 'nisn', 'nama', 'search'));
    }
}
