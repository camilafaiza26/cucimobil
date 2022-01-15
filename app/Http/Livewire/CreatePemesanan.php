<?php

namespace App\Http\Livewire;

use App\Models\Pemesanan;
use App\Models\Pelanggan;
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
            'pemesanan.tanggal_pemesanan' => 'required',
            'pemesanan.paket_id' => 'required',
            'pemesanan.merek_id' => 'required',
            'pemesanan.plat' => 'required|max:8',
        ];
    }

    public function createPemesanan ()
    {
        $this->resetErrorBag();
        $this->validate();

        Pemesanan::create($this->pemesanan);
       
        $this->pemesanan['user_id']= Auth::user()->id;
        $this->reset('pemesanan');

        toast('Data pemesanan berhasil tersimpan!','success');
        return redirect()->route('pemesanan');
    }

    public function updatePemesanan ()
    {
        $this->resetErrorBag();
        $this->validate();
      

        Pemesanan::query()
            ->where('id', $this->pemesananId)
            ->update([
                "pelanggan_id" => $this->pemesanan->pelanggan_id,
                "tanggal_pemesanan" => $this->pemesanan->tanggal_pemesanan,
                "paket_id" => $this->pemesanan->paket_id,
                "merek_id" => $this->pemesanan->pelanggan_id,
                "plat" => $this->pemesanan->pelanggan_id,
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
            'pelanggans' => Pelanggan::select('id','nama')->get()
        ]);
    }
}
