<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pelanggan;


class PelangganController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.pelanggan-data', [
            'pelanggan' => Pelanggan::class
        ]);
    }
    public function riwayat_view ($pelangganId)
    {
        return view('pages.user.riwayat-data', [
            'pelanggan' => Paket::class,
            'pelangganId' => $pelangganId
        ]);
    }

}
