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

    <x-data-table :data="$data" :model="$pakets">
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
                   Layanan
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
            @foreach ($pakets as $paket)
                <tr x-data="window.__controller.dataTableController({{ $paket->pemesanan_id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$paket->tanggal_pemesanan}}</td>
                    <td>{{$paket->plat}}</td>
                    <td>{{$paket->nama_paket}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 text-center">
                        @foreach ($paket->layanan as $detail_paket)
                        <span class="bg-gray-200 text-xs font-normal px-2 py-px border rounded-full inline-flex my-px">
                            {{ $detail_paket->nama_layanan }}
                        </span>
                    @endforeach
                    </td>

                    <td>{{$paket->nama_merek}}</td>
                    <td>Rp{{ number_format($paket->harga_paket,0,',','.') }}</td>
                    @if ($paket->status_bayar == 0)
                        
                    <td class="text-center"><span class="bg-red-600 text-white py-2 px-3 rounded-full ">  Belum Bayar <span></td>
                        
                    @else
                    <td class="text-center"><a  href="/pemesanan/bayar/{{ $paket->pemesanan_id }}" class=" text-blue-700 font-semibold  py-2 px-4 border border-blue-500 rounded-full transform transition duration-500 hover:scale-110">
                        Lihat Struk
                    </a></td>
                    
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