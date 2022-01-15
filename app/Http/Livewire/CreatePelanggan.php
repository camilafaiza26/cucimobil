<?php

namespace App\Http\Livewire;

use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreatePelanggan extends Component
{
    public $pelanggan;
    public $pelangganId;
    public $action;
    public $button;


    protected function getRules()
    {
    
        return[
            'pelanggan.nama' => 'required|min:3',
            'pelanggan.nohp' => 'required|max:20',
            'pelanggan.alamat' => 'required|max:250'
        ];
    }

    public function createPelanggan ()
    {
        $this->resetErrorBag();
        $this->validate();

        Pelanggan::create($this->pelanggan);
       
        $this->reset('pelanggan');

        toast('Data Pelanggan berhasil tersimpan!','success');
        return redirect()->route('pelanggan');
    }

    public function updatePelanggan ()
    {
        $this->resetErrorBag();
        $this->validate();
      

        pelanggan::query()
            ->where('id', $this->pelangganId)
            ->update([
                "nama" => $this->pelanggan->nama,
                "nohp" => $this->pelanggan->nohp,
                "alamat" => $this->pelanggan->alamat,
            
            ]);

      
        toast('Data pelanggan berhasil terupdate!','success');
        return redirect()->route('pelanggan');
    }

    public function mount ()
    {
        if (!$this->pelanggan && $this->pelangganId) {
            $this->pelanggan = pelanggan::find($this->pelangganId);
        }

        $this->button = create_button($this->action, "pelanggan");
    }

    public function render()
    {
        return view('livewire.create-pelanggan');
    }
}
