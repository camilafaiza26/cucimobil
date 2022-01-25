<?php

namespace App\Http\Controllers;

use App\Exports\StrukExport;
use App\Models\Paket;
use App\Models\Pemesanan;
use App\Models\Layanan_Paket;
use Carbon\Carbon;
use Dotenv\Util\Str;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PemesananController extends Controller
{

    private $excel;
     public function __construct(Excel $excel)
     {
         $this->excel = $excel;
     }
    public function index_view ()
    {
        $tanggalSekarang = Carbon::today('Asia/Jakarta')->format('Y-m-d');
        $sudahBayarNow = Pemesanan::where('status_bayar',1)->where('tanggal_pemesanan',$tanggalSekarang )->count();
        $belumBayarNow = Pemesanan::where('status_bayar',0)->where('tanggal_pemesanan',$tanggalSekarang )->count();
        $pemesananHariIni = Pemesanan::where('tanggal_pemesanan',$tanggalSekarang )->count();
        $totalHariIni = Pemesanan::select('pakets.harga_paket')
        ->join('pakets', 'pakets.id','=', 'pemesanans.paket_id')
        ->where('pemesanans.status_bayar',1)
        ->where('pemesanans.tanggal_pemesanan',$tanggalSekarang )->sum('pakets.harga_paket');
        return view('pages.user.pemesanan-data', [
            'pemesanan' => Pemesanan::class,
            'sudahBayarNow' => $sudahBayarNow,
            'belumBayarNow' => $belumBayarNow,
            'pemesananHariIni' =>   $pemesananHariIni,
            'totalHariIni' => $totalHariIni,
           
        ]);
    }

    public function bayar_view ($id){
        $pemesanan = Pemesanan::select('pemesanans.*','pelanggans.nama','mereks.nama_merek','pakets.nama_paket','users.name')
        ->join('pelanggans','pelanggans.id', '=', 'pemesanans.pelanggan_id')
        ->join('mereks','mereks.id', '=', 'pemesanans.merek_id')
        ->join('pakets','pakets.id', '=', 'pemesanans.paket_id')
        ->join('users','users.id', '=', 'pemesanans.user_id')
        ->where('pemesanans.id', $id)
        ->get();
        $layanans =  Pemesanan::select('pemesanans.paket_id', 'layanans.nama_layanan', 'jenis_mobils.nama_jenis', 'layanans.harga')
        ->join('layanan_paket', 'layanan_paket.paket_id' , '=', 'pemesanans.paket_id')
        ->join('layanans','layanans.id', '=', 'layanan_paket.layanan_id')
        ->join('jenis_mobils','jenis_mobils.id', '=', 'layanans.jenis_id')
        ->where('pemesanans.id', $id)
        ->get();
        $totals = Pemesanan::select('pakets.harga_paket', 'pakets.diskon')
        ->join('pakets','pakets.id', '=', 'pemesanans.paket_id')
        ->where('pemesanans.id', $id)
        ->first();
        $bayar = Pemesanan::select('pemesanans.status_bayar')
        ->where('pemesanans.id', $id)
        ->first();
        $totalAwalLayanan = Pemesanan::select('layanans.harga')
        ->join('layanan_paket','layanan_paket.paket_id', '=' ,'pemesanans.paket_id')
        ->join('layanans', 'layanans.id', '=', 'layanan_paket.layanan_id')
        ->where('pemesanans.id', $id)
        ->sum('layanans.harga');

        return view('pages.user.bayar-data', [
           'id' => $id,
           'pemesanans'=> $pemesanan,
           'layanans'=> $layanans,
           'bayar' => $bayar,
           'totals'=> $totals,
           'totalAwalLayanan' =>$totalAwalLayanan
        ]);
    }

    public function konfirmasi_view($pemesananId){
      
        alert()->question('Apakah Data Sudah Benar?','Pastikan data yang anda isi sudah benar!')
      
        ->showConfirmButton('<a href="/pemesanan/bayar/'.$pemesananId.'/konfirmasi/iya" class="text-white no-underline hover:no-underline">Bayar</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batalkan', '#aaa')->reverseButtons();

        return back();
       
    }

    public function konfirmasi_iya($pemesananId){
      
        $affected = DB::table('pemesanans')
        ->where('id', $pemesananId)
        ->update(['status_bayar' => 1]);
            toast('Data Pemesanan telah dibayar!','success');
            return redirect()->route('pemesanan');
      
       
    }
    public function cetak_struk($pemesananId){

        $id = $pemesananId;
        $pemesanan = Pemesanan::select('pemesanans.*','pelanggans.nama','mereks.nama_merek','pakets.nama_paket','users.name')
        ->join('pelanggans','pelanggans.id', '=', 'pemesanans.pelanggan_id')
        ->join('mereks','mereks.id', '=', 'pemesanans.merek_id')
        ->join('pakets','pakets.id', '=', 'pemesanans.paket_id')
        ->join('users','users.id', '=', 'pemesanans.user_id')
        ->where('pemesanans.id', $id)
        ->first();
        $layanans =  Pemesanan::select('pemesanans.paket_id', 'layanans.nama_layanan', 'jenis_mobils.nama_jenis', 'layanans.harga')
        ->join('layanan_paket', 'layanan_paket.paket_id' , '=', 'pemesanans.paket_id')
        ->join('layanans','layanans.id', '=', 'layanan_paket.layanan_id')
        ->join('jenis_mobils','jenis_mobils.id', '=', 'layanans.jenis_id')
        ->where('pemesanans.id', $id)
        ->get();
        $totals = Pemesanan::select('pakets.harga_paket','pakets.harga_paket')
        ->join('pakets','pakets.id', '=', 'pemesanans.paket_id')
        ->where('pemesanans.id', $id)
        ->first();
        $bayar = Pemesanan::select('pemesanans.status_bayar')
        ->where('pemesanans.id', $id)
        ->first();
        $totalAwalLayanan = Pemesanan::select('layanans.harga')
        ->join('layanan_paket','layanan_paket.paket_id', '=' ,'pemesanans.paket_id')
        ->join('layanans', 'layanans.id', '=', 'layanan_paket.layanan_id')
        ->where('pemesanans.id', $id)
        ->sum('layanans.harga');
        


        $pdf = \PDF::loadView('pages.user.export.cetak_struk',
        compact( 'id', 'pemesanan', 'layanans', 'bayar', 'totals','totalAwalLayanan'))->setPaper('a4', 'landscape');
        return $pdf->download('invoice.pdf');
        
    }
}
