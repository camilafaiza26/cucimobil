<div>
  
    <p> Nama Pelanggan : {{$nama->nama}}</p>

    <x-data-table :data="$data" :model="$pelanggans">
        
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('plat')" role="button" href="#">
                    Plat
                    @include('components.sort-icon', ['field' => 'plat'])
                </a></th>
                <th><a wire:click.prevent="sortBy('harga')" role="button" href="#">
                    Nama Paket
                     @include('components.sort-icon', ['field' => 'harga'])
                 </a></th>
                 <th><a wire:click.prevent="sortBy('harga')" role="button" href="#">
                   Jenis Mobil
                     @include('components.sort-icon', ['field' => 'harga'])
                 </a></th>
                <th><a wire:click.prevent="sortBy('harga')" role="button" href="#">
                   Harga 
                    @include('components.sort-icon', ['field' => 'harga'])
                </a></th>
                
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pelanggans as $pelanggan)
                <tr x-data="window.__controller.dataTableController({{ $pelanggan->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$pelanggan->plat}}</td>
                    <td>{{$pelanggan->nama_paket}}</td>
                   
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
<script>
  document.getElementById("status_pembayaran").style.visibility="hidden";
  document.getElementById("buttonAdd").style.visibility="hidden";
  document.getElementById("buttonExport").style.visibility="hidden";
</script>