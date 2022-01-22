<div>
    <x-data-table :data="$data" :model="$pakets">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama_paket')" role="button" href="#">
                    Nama Paket
                    @include('components.sort-icon', ['field' => 'nama_paket'])
                </a></th>
                <th><a wire:click.prevent="sortBy('diskon')" role="button" href="#">
                    Diskon
                    @include('components.sort-icon', ['field' => 'diskon'])
                </a></th>
                <th><a wire:click.prevent="sortBy('harga_paket')" role="button" href="#">
                    Harga Paket
                    @include('components.sort-icon', ['field' => 'harga_paket'])
                </a></th>
                <th>
                    Layanan  
                </th>
               
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pakets as $paket)
                <tr x-data="window.__controller.dataTableController({{ $paket->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $paket->nama_paket }}</td>
                    <td>{{ $paket->diskon }}%</td>
                    <td>Rp{{ number_format($paket->harga_paket,2,',','.')}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 text-center">
                                    @foreach ($paket->layanan as $detail_paket)
                                    <span class="bg-gray-200 text-xs font-normal px-2 py-px border rounded-full inline-flex my-px">
                                        {{ $detail_paket->nama_layanan }}
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
<script>
    document.getElementById("status_pembayaran").remove();
    document.getElementById("buttonExport").remove();
    
  </script>