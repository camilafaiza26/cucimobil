<div>
    <x-data-table :data="$data" :model="$jeniss">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama_jenis')" role="button" href="#">
                    Nama Jenis
                    @include('components.sort-icon', ['field' => 'nama_jenis'])
                </a></th>
               
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($jeniss as $jenis)
                <tr x-data="window.__controller.dataTableController({{ $jenis->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jenis->nama_jenis }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/jenis/edit/{{ $jenis->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
