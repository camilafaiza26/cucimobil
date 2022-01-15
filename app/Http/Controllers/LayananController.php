<?php

namespace App\Http\Controllers;

use App\Models\Layanan;

class LayananController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.layanan-data', [
            'layanan' => Layanan::class
        ]);
    }

}


