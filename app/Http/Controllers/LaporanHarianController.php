<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;

class LaporanHarianController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.laporanharian-data', [
            'harian' => Pemesanan::class
        ]);
    }

}


