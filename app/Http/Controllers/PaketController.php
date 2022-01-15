<?php

namespace App\Http\Controllers;

use App\Models\Paket;

class PaketController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.paket-data', [
            'paket' => Paket::class
        ]);
    }

}


