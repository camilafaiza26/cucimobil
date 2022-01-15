<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Carbon\Carbon;

class PemesananController extends Controller
{

    public function index_view ()
    {
        $tanggalSekarang = Carbon::today('Asia/Jakarta')->format('Y-m-d');
        $sudahBayarNow = Pemesanan::where('status_bayar',1)->where('tanggal_pemesanan',$tanggalSekarang )->count();
        $belumBayarNow = Pemesanan::where('status_bayar',0)->where('tanggal_pemesanan',$tanggalSekarang )->count();
        $pemesananHariIni = Pemesanan::where('tanggal_pemesanan',$tanggalSekarang )->count();
        $totalHariIni = Pemesanan::select('pakets.harga')
        ->join('pakets', 'pakets.id','=', 'pemesanans.paket_id')
        ->where('pemesanans.status_bayar',1)
        ->where('pemesanans.tanggal_pemesanan',$tanggalSekarang )->sum('pakets.harga');
        return view('pages.user.pemesanan-data', [
            'pemesanan' => Pemesanan::class,
            'sudahBayarNow' => $sudahBayarNow,
            'belumBayarNow' => $belumBayarNow,
            'pemesananHariIni' =>   $pemesananHariIni,
            'totalHariIni' => $totalHariIni,
           
        ]);
    }

}
