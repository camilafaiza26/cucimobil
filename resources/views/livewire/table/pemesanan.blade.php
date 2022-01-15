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
                    <td>{{ $pemesanan->nama_merek }}</td>
                    <td>{{ $pemesanan->plat }}</td>
                    @if ($pemesanan->status_bayar == 1)
                    <td>Sudah Dibayar</td>
                    @else
                    <td class="text-center"> 
                        <button class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Open Modal</button>
                        <x-jet-danger-button wire:click="bayarPemesanan({{$pemesanan->id}})" wire:loading.attr="disabled">
                            {{ __('Delete Account') }}
                        </x-jet-danger-button>
                    </td>
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

<x-jet-dialog-modal wire:model="bayarPemesanan">
    <x-slot name="title">
        {{ __('Delete Account') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

       
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('bayar', false)" wire:loading.attr="disabled">
            {{ __('Cansel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
            {{ __('Bayar') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
