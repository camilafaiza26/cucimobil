<?php

namespace App\Http\Livewire;

use App\Models\Jenis;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreateJenis extends Component
{
    public $jenis;
    public $jenisId;
    public $action;
    public $button;


    protected function getRules()
    {
        
        return ([
            'jenis.nama_jenis' => 'required',
        ]);
    }

    public function createJenis ()
    {
        $this->resetErrorBag();
        $this->validate();


       
        Jenis::create($this->jenis);

       
        $this->reset('jenis');

        toast('Data jenis mobil berhasil tersimpan!','success');
        return redirect()->route('jenis');
    }

    public function updateJenis ()
    {
        $this->resetErrorBag();
        $this->validate();
       //VALIDASI ERROR

        Jenis::query()
            ->where('id', $this->jenisId)
            ->update([
                "nama_jenis" => $this->jenis->nama_jenis,
            ]);

      
        toast('Data jenis mobil berhasil terupdate!','success');
        return redirect()->route('jenis');
    }

    public function mount ()
    {
        if (!$this->jenis && $this->jenisId) {
            $this->jenis = Jenis::find($this->jenisId);
        }

        $this->button = create_button($this->action, "Jenis");
    }

    public function render()
    {
        return view('livewire.create-jenis');
    }
}
