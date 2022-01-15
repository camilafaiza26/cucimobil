<?php

namespace App\Http\Controllers;

use App\Models\Jenis;

class JenisController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.jenis-data', [
            'jenis' => Jenis::class
        ]);
    }

}


