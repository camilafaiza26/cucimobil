<div>
    <x-data-table :data="$data" :model="$pelanggans">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'nama'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nohp')" role="button" href="#">
                    Nomor Hp
                    @include('components.sort-icon', ['field' => 'nohp'])
                </a></th>
                <th><a wire:click.prevent="sortBy('alamat')" role="button" href="#">
                    Alamat
                    @include('components.sort-icon', ['field' => 'alamat'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_on')" role="button" href="#">
                    Bergabung Sejak
                    @include('components.sort-icon', ['field' => 'created_on'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pelanggans as $pelanggan)
                <tr x-data="window.__controller.dataTableController({{ $pelanggan->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->nohp}}</td>
                    <td>{{ $pelanggan->alamat}}</td>
                    <td>{{ $pelanggan->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/pelanggan/edit/{{ $pelanggan->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" href="/pelanggan/riwayat/{{ $pelanggan->id }}" class="mr-3"><i class="fa fa-16px fa-eye"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
<script>
  document.getElementById("status_pembayaran").style.visibility="hidden";
</script>