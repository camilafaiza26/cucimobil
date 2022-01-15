<div>
   
    <x-data-table :data="$data" :model="$pemesanans">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No Antrian
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tanggal_pemesanan')" role="button" href="#">
                    Tanggal Pemesanan
                     @include('components.sort-icon', ['field' => 'tanggal_pemesanan'])
                 </a></th>
                <th><a wire:click.prevent="sortBy('pelanggan_id')" role="button" href="#">
                    Nama Pelanggan
                    @include('components.sort-icon', ['field' => 'pelanggan_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('paket_id')" role="button" href="#">
                   Paket
                    @include('components.sort-icon', ['field' => 'paket_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama_layanan')" role="button" href="#">
                    Layanan
                     @include('components.sort-icon', ['field' => 'nama_layanan'])
                 </a></th>
                <th><a wire:click.prevent="sortBy('merek_id')" role="button" href="#">
                    Merek
                    @include('components.sort-icon', ['field' => 'merek_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('plat')" role="button" href="#">
                   Plat
                    @include('components.sort-icon', ['field' => 'plat'])
                </a></th>
                <th><a wire:click.prevent="sortBy('status_bayar')" role="button" href="#">
                    Status Bayar
                     @include('components.sort-icon', ['field' => 'status_bayar'])
                 </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pemesanans as $pemesanan)
                <tr x-data="window.__controller.dataTableController({{ $pemesanan->id }})">
                    <td class="text-center"><span class="text-white bg-blue-500 rounded-full px-3 py-2"> {{ $loop->iteration }} </span> </td>
                    <td>{{ $pemesanan->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $pemesanan->nama}}</td>
                    <td>{{ $pemesanan->nama_paket}}</td>
                    <td>{{ $pemesanan->nama_layanan}}</td>
                    <td>{{ $pemesanan->nama_merek }}</td>
                    <td>{{ $pemesanan->plat }}</td>
                    @if ($pemesanan->status_bayar == 1)
                    <td>Sudah Dibayar</td>
                    @else
                    <td class="text-center"> <a role="button" href="/pemesanan/bayar/{{ $pemesanan->id }}" class="hover:no-underline bg-red-500 rounded-lg px-3 py-2 text-white mr-3  hover:bg-red-600">Bayar</a></td>
                    @endif
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/pemesanan/edit/{{ $pemesanan->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
