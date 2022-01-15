<?php

namespace App\Traits;


trait WithDataTable {
    
    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
                case 'pelanggan':
                    $pelanggans = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);
    
                    return [
                        "view" => 'livewire.table.pelanggan',
                        "pelanggans" => $pelanggans,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('pelanggan.new'),
                                'create_new_text' => 'Buat Pelanggan Baru',
                                'export' => '#',
                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                    case 'pemesanan':
                        $pemesanans = $this->model::search($this->search)
                            ->select('pemesanans.*', 'pelanggans.nama', 'pakets.nama_paket', 'mereks.nama_merek', 'layanans.nama_layanan')
                            ->join('pelanggans', 'pelanggans.id','=','pemesanans.pelanggan_id')
                            ->join('pakets', 'pakets.id','=','pemesanans.paket_id')
                            ->join('mereks', 'mereks.id','=','pemesanans.merek_id')
                            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                            ->where('status_bayar', $this->status)
                            ->paginate($this->perPage);
        
                        return [
                            "view" => 'livewire.table.pemesanan',
                            "pemesanans" => $pemesanans,
                            "data" => array_to_object([
                                'href' => [
                                    'create_new' => route('pemesanan.new'),
                                    'create_new_text' => 'Buat Pemesanan Baru',
                                    'export' => '#',
                                    'export_text' => 'Export'
                                ]
                            ])
                        ];
                        break;
                        case 'jenis':
                            $jeniss = $this->model::search($this->search)
                                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                ->paginate($this->perPage);
            
                            return [
                                "view" => 'livewire.table.jenis',
                                "jeniss" => $jeniss,
                                "data" => array_to_object([
                                    'href' => [
                                        'create_new' =>route('jenis.new'),
                                        'create_new_text' => 'Buat Jenis Mobil Baru',
                                        'export' => '#',
                                        'export_text' => 'Export'
                                    ]
                                ])
                            ];
                            break;
                            case 'merek':
                                $mereks = $this->model::search($this->search)
                                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                    ->paginate($this->perPage);
                
                                return [
                                    "view" => 'livewire.table.merek',
                                    "mereks" => $mereks,
                                    "data" => array_to_object([
                                        'href' => [
                                            'create_new' =>route('merek.new'),
                                            'create_new_text' => 'Buat Merek Mobil Baru',
                                            'export' => '#',
                                            'export_text' => 'Export'
                                        ]
                                    ])
                                ];
                                break;
                            case 'layanan':
                                $layanans = $this->model::search($this->search)
                                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                    ->paginate($this->perPage);
                
                                return [
                                    "view" => 'livewire.table.layanan',
                                    "layanans" => $layanans,
                                    "data" => array_to_object([
                                        'href' => [
                                            'create_new' =>route('layanan.new'),
                                            'create_new_text' => 'Buat Layanan Baru',
                                            'export' => '#',
                                            'export_text' => 'Export'
                                        ]
                                    ])
                                ];
                                break;
                            case 'paket':
                                $pakets = $this->model::search($this->search)
                                    ->with('detail_paket')
                                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                    ->paginate($this->perPage);
                
                                return [
                                    "view" => 'livewire.table.paket',
                                    "pakets" => $pakets,
                                    "data" => array_to_object([
                                        'href' => [
                                            'create_new' =>route('paket.new'),
                                            'create_new_text' => 'Buat Paket Baru',
                                            'export' => '#',
                                            'export_text' => 'Export'
                                        ]
                                    ])
                                ];
                                break;

            default:
                # code...
                break;
        }
    }
}