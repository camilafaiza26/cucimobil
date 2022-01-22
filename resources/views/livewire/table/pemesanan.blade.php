<div>
    <x-data-table :data="$data" :model="$pemesanans">
        <x-slot name="head">
            <tr class="bg-blue-100">
                <th colspan="3"> <p class="text-blue-500"> Informasi Pemesanan </p>
                </th>
                <th colspan="2"> <p class="text-blue-500"> Informasi Kendaraan </p>
                </th>
                <th colspan="3"> <p class="text-blue-500"> Informasi Transaksi </p>
                </th>
                <th rowspan="2">
                    Aksi
                </th>
            </tr>
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
                <th><a wire:click.prevent="sortBy('nama_merek')" role="button" href="#">
                    Merek
                    @include('components.sort-icon', ['field' => 'nama_merek'])
                </a></th>
                <th><a wire:click.prevent="sortBy('plat')" role="button" href="#">
                   Plat
                    @include('components.sort-icon', ['field' => 'plat'])
                </a></th>
                <th><a wire:click.prevent="sortBy('paket_id')" role="button" href="#">
                    Paket
                     @include('components.sort-icon', ['field' => 'paket_id'])
                 </a></th>
                 <th><a wire:click.prevent="sortBy('harga')" role="button" href="#">
                     Harga
                      @include('components.sort-icon', ['field' => 'harga'])
                  </a></th>
                <th><a wire:click.prevent="sortBy('status_bayar')" role="button" href="#">
                    Status Bayar
                     @include('components.sort-icon', ['field' => 'status_bayar'])
                 </a></th>
              
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pemesanans as $pemesanan)
                <tr x-data="window.__controller.dataTableController({{ $pemesanan->id }})">
                    <td class="text-center"><span class="text-blue-600 font-bold"> {{ $loop->iteration }} </span> </td>
                    <td>{{ $pemesanan->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $pemesanan->nama}}</td>
                    <td>{{ $pemesanan->nama_merek }}</td>
                    <td>{{ $pemesanan->plat }}</td>
                    <td>  <a role="button" wire:click="lihatPaket({{$pemesanan->paket_id}})">
                       {{$pemesanan->nama_paket}}
                    </a> </td>
                    <td>Rp{{ number_format($pemesanan->harga_paket,0,',','.') }}</td>
                    @if ($pemesanan->status_bayar == 1)
                    <td>  <a  href="/pemesanan/bayar/{{ $pemesanan->id }}">
                        {{ __(' Cetak Struk ') }}
                    </a></td>
                    @else
                    <td class="text-center"> 
                        <a  href="/pemesanan/bayar/{{ $pemesanan->id }}">
                            {{ __(' Lakukan Pembayaran') }}
                        </a>
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
    <x-jet-dialog-modal wire:model="lihatPaket">
        <x-slot name="title">
            {{ __('Infromasi Paket') }}
        </x-slot>

        <x-slot name="content">
           @if ($this->namaPaket == null && $this->layananPaket == null)
               
           @else
           @foreach ($this->namaPaket as $paketNya)
           <table class="table-auto mb-4">
                    
            <tr>
                <td >Nama Paket</td>
                <td class="px-5">: {{$paketNya->nama_paket}}</td>
                
              </tr>
              <tr>
                <td>Diskon</td>
                <td class="px-5" >: {{$paketNya->diskon}}%</td>
                
              </tr>
              <tr>
                <td>Harga Paket</td>
                <td class="px-5">: Rp{{number_format($paketNya->harga_paket,0,',','.')}}</td>
              </tr>
        </table>
       @endforeach
         
          
    <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-md sm:rounded-lg">
    <table class="min-w-full">
    <thead class="bg-gray-50 dark:bg-gray-700">
    <tr>
    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
    Nama Layanan
    </th>
    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
    Jenis mobil
    </th>
    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
    Harga Awal
    </th>
    </tr>
    </thead>
    <tbody>
    

        @foreach($this->layananPaket as $layanan)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="py-2 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{$layanan->nama_layanan}}
    </td>
    <td class="py-2 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
        {{$layanan->nama_jenis}}
    </td>
    <td class="py-2 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
        Rp{{number_format($layanan->harga,0,',','.')}}
    </td>
   
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    
    @endif              
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('lihatPaket', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>



