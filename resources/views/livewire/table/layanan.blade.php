<div>
    <x-data-table :data="$data" :model="$layanans">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
               
                <th><a wire:click.prevent="sortBy('nama_layanan')" role="button" href="#">
                    Nama Layanan
                    @include('components.sort-icon', ['field' => 'nama_layanan'])
                </a></th>
                <th><a wire:click.prevent="sortBy('harga')" role="button" href="#">
                    Harga
                     @include('components.sort-icon', ['field' => 'harga'])
                 </a></th>
                 <th><a wire:click.prevent="sortBy('nama_jenis')" role="button" href="#">
                    Jenis
                     @include('components.sort-icon', ['field' => 'nama_jenis'])
                 </a></th>
               
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($layanans as $layanan)
                <tr x-data="window.__controller.dataTableController({{ $layanan->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $layanan->nama_layanan }}</td>
                    <td>Rp{{ number_format($layanan->harga,2,',','.')}}</td>
                    <td>{{ $layanan->nama_jenis }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/layanan/edit/{{ $layanan->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
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