<?php

namespace App\Http\Livewire\Table;

use App\Models\Layanan;
use App\Models\Layanan_Paket;
use App\Models\Paket;
use App\Models\Pemesanan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class Main extends Component
{
    use WithPagination, WithDataTable;
    

    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';
    public $status= '0';
    public $bayarPesanan = false;
    public $pelangganId;
    public $harga;
    public $hargaM;
    public $lihatPaket = false;
    public $namaPaket = null;
    public $layananPaket = null;
   
    protected $listeners = [ "deleteItem" => "delete_item" ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function render()
    {
     
        $data = $this->get_pagination_data();
        $this->bayarPemesanan = false;
        return view($data['view'], $data);
    }

    public function lihatPaket($paket_id)
    {

        $this->lihatPaket = $paket_id;
        $this->namaPaket = Paket::find($paket_id)->get();
        $this->layananPaket = Layanan_Paket::select('layanans.nama_layanan','layanans.harga','jenis_mobils.nama_jenis')
        ->join('layanans', 'layanans.id', 'layanan_paket.layanan_id')
        ->join('jenis_mobils', 'jenis_mobils.id', 'layanans.jenis_id')
        ->where('layanan_paket.paket_id', $paket_id)->get();
    }



    public function bayarPesanan($id, $harga)
    {
        $this->bayarPesanan = $id;
        $this->hargaM = $harga;
    }

    protected function getRules()
    {
        
        return ([
            'harga' => 'required|numeric',
        ]);
    }


    public function updateBayar($bayarPesanan){
        $this->resetErrorBag();
        $this->validate();
        if($this->hargaM == $this->harga){
            
        }
        else{
            

        }
        $this->reset('harga');
    }
}
