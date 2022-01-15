<?php

namespace App\Http\Livewire;

use App\Models\Paket;
use App\Models\Jenis;
use App\Models\Layanan;
use App\Models\Detail_Paket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class CreatePaket extends Component
{
    public $paket;
    public $paketId;
    public $action;
    public $button;
    public $inputs = [];
    public $i = 1;
    public $timestamp = false;
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
 
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }


    protected function getRules()
    {
        
        return ([
            'paket.nama_paket' => 'required',
        ]);
    }

    public function createPaket ()
    {
        $this->resetErrorBag();
        $this->validate();


        //$this->paket['created_at'] = null;
       // $this->paket['updated_at']= null;


        foreach ($this->paket['layanan_id'] as $key => $value) {
            Detail_Paket::create(['layanan_id' => $this->paket['layanan_id'][$key], 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'paket_id' => Paket::latest('id')->first()]);
        }

        $this->inputs = [];

       
        $this->reset('paket');

        toast('Data paket berhasil tersimpan!','success');
        return redirect()->route('paket');
    }

    public function updatePaket ()
    {
        $this->resetErrorBag();
        $this->validate();
       //VALIDASI ERROR

        Paket::query()
            ->where('id', $this->paketId)
            ->update([
                "nama_paket" => $this->paket->nama_paket,
            ]);

      
        toast('Data paket berhasil terupdate!','success');
        return redirect()->route('paket');
    }

    public function mount ()
    {
        if (!$this->paket && $this->paketId) {
            $this->paket = Paket::find($this->paketId);
        }

        $this->button = create_button($this->action, "Paket");
    }

    public function render()
    {
        
        $jeniss = Jenis::all();
        $layanans = Layanan::all();
        return view('livewire.create-paket',compact('jeniss', 'layanans'));
        
    }

}
