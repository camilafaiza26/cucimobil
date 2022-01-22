<div>
    <div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
        <div class="p-8 pt-4 mt-2 bg-white">
            <h2 class="text-lg text-grey-600 -ml-3 pb-3">Data Pelanggan</h2>
            <div class="flex pb-4 -ml-3">
           
            <table class="w-full h-full border-collapse border border-slate-400">
                <tr >
                    <td class="py-3 px-2 border border-slate-300 text-blue-500">Nama pelanggan</td>
                    <td class=" px-2 border border-slate-300">{{$nama->nama}}</td>
                    <td class=" px-2  border border-slate-300 text-blue-500 ">Nomor handphone</td>
                    <td class=" px-2 border border-slate-300">{{$nama->nohp}}</td>
            
                </tr>
                <tr>
                    <td class=" py-3  px-2 border border-slate-300 text-blue-500">Alamat pelanggan</td>
                    <td class="px-2 border border-slate-300 ">{{$nama->alamat}}</td>
                    <td class=" px-2 border border-slate-300 text-blue-500">Bergabung sejak</td>
                    <td class=" px-2 border border-slate-300">{{date('d-M-Y', strtotime($nama->created_at))}}</td>
            
                </tr>
            
            </table>
            </div>
        </div>
    </div>

    <x-data-table :data="$data" :model="$pelanggans">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                   Tanggal Pemesanan
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
                    Merek Mobil
                      @include('components.sort-icon', ['field' => 'harga'])
                  </a></th>
                <th><a wire:click.prevent="sortBy('harga')" role="button" href="#">
                   Harga 
                    @include('components.sort-icon', ['field' => 'harga'])
                </a></th>
                <th><a wire:click.prevent="sortBy('harga')" role="button" href="#">
                    Status Pembayaran 
                     @include('components.sort-icon', ['field' => 'harga'])
                 </a></th>
                
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pelanggans as $pelanggan)
                <tr x-data="window.__controller.dataTableController({{ $pelanggan->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$pelanggan->tanggal_pemesanan}}</td>
                    <td>{{$pelanggan->plat}}</td>
                    <td>{{$pelanggan->nama_paket}}</td>
                    <td>{{$pelanggan->nama_jenis}}</td>
                    <td>{{$pelanggan->nama_merek}}</td>
                    <td>Rp{{ number_format($pelanggan->harga,0,',','.') }}</td>
                    @if ($pelanggan->status_bayar == 0)
                        
                    <td class="text-center"><span class="bg-red-600 text-white py-2 px-3 rounded-full ">  Belum Bayar <span></td>
                        
                    @else
                    <td class="text-center"><button class=" text-blue-700 font-semibold  py-2 px-4 border border-blue-500 rounded-full transform transition duration-500 hover:scale-110">
                        Lihat Struk
                      </button></td>
                    
                    @endif                   
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
<script>
  document.getElementById("status_pembayaran").remove();
  document.getElementById("buttonAdd").remove();
  
</script>