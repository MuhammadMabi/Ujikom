<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CekPembayaran;

class DetailPembayaranController extends Controller
{
    public function index()
    {
        $detailpembayaran = CekPembayaran::all();

        return view('detailpembayaran.index', compact('detailpembayaran'));
    }

    public function print()
    {
        $detailpembayaran = CekPembayaran::all();

        return view('printout', compact('detailpembayaran'));
    }
}
