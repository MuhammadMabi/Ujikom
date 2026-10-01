<?php

namespace App\Http\Controllers;

use App\Models\CekPembayaran;

class HomeController extends Controller
{
    public function index()
    {
        $belumLunas = CekPembayaran::where('status_pembayaran', 'Belum Lunas')->get();
        $sudahLunas = CekPembayaran::where('status_pembayaran', 'Sudah Lunas')->get();

        return view('home', compact('belumLunas', 'sudahLunas'));
    }
}
