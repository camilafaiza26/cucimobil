<?php

namespace App\Http\Livewire;

use App\Models\Merek;
use App\Models\Paket;
use App\Models\Pemesanan;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreatePemesanan extends Component
{
    public $pemesanan;
    public $pemesananId;
    public $action;
    public $button;
    public $ottPlatform = '';
 
    protected function getRules()
    {
        return[
            'pemesanan.pelanggan_id' => 'required',
            'pemesanan.paket_id' => 'required',
            'pemesanan.merek_id' => 'required',
            'pemesanan.plat' => 'required|max:8',
        ];
    }

    public function createPemesanan ()
    {
        $this->resetErrorBag();
        $this->validate();

       
       $dateNow = Carbon::now()->format('Y-m-d');
       $this->pemesanan['tanggal_pemesanan']= $dateNow;
        $this->pemesanan['user_id']= Auth::user()->id;
    
        $this->pemesanan['status_bayar']= 0;
        Pemesanan::create($this->pemesanan);
        $this->reset('pemesanan');

        toast('Data pemesanan berhasil tersimpan!','success');
        return redirect()->route('pemesanan');
    }

    public function updatePemesanan ()
    {
        $this->resetErrorBag();
        $this->validate();
      
        $dateNow = Carbon::now()->format('Y-m-d');
        Pemesanan::query()
            ->where('id', $this->pemesananId)
            ->update([
                "pelanggan_id" => $this->pemesanan->pelanggan_id,
                "tanggal_pemesanan" => $dateNow,
                "paket_id" => $this->pemesanan->paket_id,
                "user_id" => Auth::user()->id,
                "status_bayar" => 0,
                "merek_id" => $this->pemesanan->merek_id,
                "plat" => $this->pemesanan->plat,
            ]);

      
        toast('Data pemesanan berhasil terupdate!','success');
        return redirect()->route('pemesanan');
    }

    public function mount ()
    {
        if (!$this->pemesanan && $this->pemesananId) {
            $this->pemesanan = pemesanan::find($this->pemesananId);
        }

        $this->button = create_button($this->action, "pemesanan");
    }

    public function render()
    {
      
        return view('livewire.create-pemesanan', [
          
            'pelanggans' => Pelanggan::select('id','nama')->get(),
            'pakets' => Paket::all(),
            'mereks' => Merek::all(),
        ]);
    }
}
