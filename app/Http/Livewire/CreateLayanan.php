<?php

namespace App\Http\Livewire;

use App\Models\Layanan;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreateLayanan extends Component
{
    public $layanan;
    public $layananId;
    public $action;
    public $button;


    protected function getRules()
    {
        
        return ([
            'layanan.nama_layanan' => 'required',
        ]);
    }

    public function createLayanan ()
    {
        $this->resetErrorBag();
        $this->validate();


       
        Layanan::create($this->layanan);

       
        $this->reset('layanan');

        toast('Data Layanan berhasil tersimpan!','success');
        return redirect()->route('layanan');
    }

    public function updateLayanan ()
    {
        $this->resetErrorBag();
        $this->validate();
       //VALIDASI ERROR

        Layanan::query()
            ->where('id', $this->layananId)
            ->update([
                "nama_layanan" => $this->layanan->nama_layanan,
            ]);

      
        toast('Data Layanan berhasil terupdate!','success');
        return redirect()->route('layanan');
    }

    public function mount ()
    {
        if (!$this->layanan && $this->layananId) {
            $this->layanan = layanan::find($this->layananId);
        }

        $this->button = create_button($this->action, "Layanan");
    }

    public function render()
    {
        return view('livewire.create-layanan');
    }
}
