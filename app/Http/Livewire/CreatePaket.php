<?php

namespace App\Http\Livewire;

use App\Models\Paket;
use App\Models\Jenis;
use App\Models\Layanan;

use App\Models\Layanan_Paket;
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
    public $timestamps = false;
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
        $this->paket['harga_paket']= 0;

        Paket::create($this->paket);
    
        $latest = Paket::latest('id')->first();
        $id = $latest->id;
        foreach ($this->paket['layanan_id'] as $key => $value) {
            Layanan_Paket::create(['layanan_id' => $this->paket['layanan_id'][$key], 
          
            'paket_id' => $latest->id,
         ]);
        }
        $totalAwalLayanan = Layanan_Paket::select('layanans.harga')
        ->join('layanans', 'layanans.id', '=', 'layanan_paket.layanan_id')
        ->where('layanan_paket.paket_id', $id)->sum('layanans.harga');

        $hargaPaket = ($this->paket['diskon']/100)*$totalAwalLayanan;
        Paket::query()
        ->where('id', $id)
        ->update([
            "harga_paket" => $hargaPaket ,
           
        ]);

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
        
        
        $layanans = Layanan::select('layanans.id','layanans.nama_layanan','jenis_mobils.nama_jenis')
        ->join('jenis_mobils', 'jenis_mobils.id', '=', 'layanans.jenis_id')->get();
        return view('livewire.create-paket',compact('layanans'));
        
    }

}
