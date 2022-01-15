<?php

namespace App\Http\Livewire;

use App\Models\Merek;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreateMerek extends Component
{
    public $merek;
    public $merekId;
    public $action;
    public $button;


    protected function getRules()
    {
        
        return ([
            'merek.nama_merek' => 'required',
        ]);
    }

    public function createMerek ()
    {
        $this->resetErrorBag();
        $this->validate();


       
        Merek::create($this->merek);

       
        $this->reset('merek');

        toast('Data merek mobil berhasil tersimpan!','success');
        return redirect()->route('merek');
    }

    public function updateMerek ()
    {
        $this->resetErrorBag();
        $this->validate();
       //VALIDASI ERROR

        Merek::query()
            ->where('id', $this->merekId)
            ->update([
                "nama_merek" => $this->merek->nama_merek,
            ]);

      
        toast('Data merek mobil berhasil terupdate!','success');
        return redirect()->route('merek');
    }

    public function mount ()
    {
        if (!$this->merek && $this->merekId) {
            $this->merek = Merek::find($this->merekId);
        }

        $this->button = create_button($this->action, "Merek");
    }

    public function render()
    {
        return view('livewire.create-merek');
    }
}
