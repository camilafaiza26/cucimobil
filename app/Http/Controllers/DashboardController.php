<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index_view ()
    {
        $record = Pelanggan::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '<', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
      
         $data = [];
     
         foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
          }
     
        $data['chart_data'] = json_encode($data);
     

        $sudahBayarNow = Pemesanan::where('status_bayar',1)->count();
        $belumBayarNow = Pemesanan::where('status_bayar',0)->count();
        $pemesananHariIni = Pemesanan::count();
        $totalHariIni = Pemesanan::select('pakets.harga_paket')
        ->join('pakets', 'pakets.id','=', 'pemesanans.paket_id')
        ->where('pemesanans.status_bayar',1)->sum('pakets.harga_paket');
        return view('dashboard', [
            'pemesanan' => Pemesanan::class,
            'sudahBayarNow' => $sudahBayarNow,
            'belumBayarNow' => $belumBayarNow,
            'pemesananHariIni' =>   $pemesananHariIni,
            'totalHariIni' => $totalHariIni,
            'data'=> $data['chart_data'],
          
        ]); 
    }

    

}


