<?php

namespace App\Http\Controllers;

use App\Models\Merek;

class MerekController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.merek-data', [
            'merek' => Merek::class
        ]);
    }

}


