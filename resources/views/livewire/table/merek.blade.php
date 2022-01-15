<div>
    <x-data-table :data="$data" :model="$mereks">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama_merek')" role="button" href="#">
                    Nama Merek
                    @include('components.sort-icon', ['field' => 'nama_merek'])
                </a></th>
               
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($mereks as $merek)
                <tr x-data="window.__controller.dataTableController({{ $merek->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $merek->nama_merek }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/merek/edit/{{ $merek->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
