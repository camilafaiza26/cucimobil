<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;

class LaporanController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.laporanharian-data', [
            'harian' => Pemesanan::class
        ]);
    }

    public function index_view_bulanan ()
    {
        return view('pages.user.laporanbulanan-data', [
            'bulanan' => Pemesanan::class
        ]);
    }

    public function export_bulanan ()
    {
      
    }

}


