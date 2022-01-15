<div>
    <x-data-table :data="$data" :model="$pakets">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama_paket')" role="button" href="#">
                    Nama Paket
                    @include('components.sort-icon', ['field' => 'nama_paket'])
                </a></th>
                <th><a wire:click.prevent="sortBy('harga')" role="button" href="#">
                    Harga Paket
                    @include('components.sort-icon', ['field' => 'harga'])
                </a></th>
                <th>
                    Layanan  
                </a></th>
               
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pakets as $paket)
                <tr x-data="window.__controller.dataTableController({{ $paket->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $paket->nama_paket }}</td>
                    <td>{{ $paket->harga }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                                    @foreach ($paket->detail_paket as $paket)
                                    <span class="bg-gray-200 text-xs font-normal px-2 py-px border rounded-full inline-flex my-px">
                                        {{ $paket->layanan_id }}
                                    </span>
                                @endforeach
                                </td>

                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/paket/edit/{{ $paket->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
