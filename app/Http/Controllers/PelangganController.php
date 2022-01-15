<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;


class PelangganController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.pelanggan-data', [
            'pelanggan' => Pelanggan::class
        ]);
    }

}
