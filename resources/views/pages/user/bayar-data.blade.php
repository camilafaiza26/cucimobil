<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Pembayaran') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('pemesanan') }}">Pemesanan</a></div>
            <div class="breadcrumb-item active"><a>Pemesanan No. {{$id}}</a></div>
        </div>
    </x-slot>

    <div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
        <div class="p-8 pt-4 mt-2 bg-white">
            <div class="flex pb-4 -ml-3">
                <table class="table-auto mb-4">
                    
                    @foreach($pemesanans as $pemesanan)
                    <tr>
                        <td >No. Pemesanan</td>
                        <td class="px-5">: {{$pemesanan->id}}</td>
                        
                      </tr>
                      <tr>
                        <td >Pelanggan</td>
                        <td class="px-5">: {{$pemesanan->nama}}</td>
                      </tr>
                      <tr>
                        <td >Tanggal Pemesanan</td>
                        <td class="px-5">: {{$pemesanan->tanggal_pemesanan}}</td>
                      </tr>
                      <tr>
                        <td >Merek/Plat Mobil</td>
                        <td class="px-5">: {{$pemesanan->nama_merek}} / {{{$pemesanan->plat}}}</td>
                      </tr>
                      <tr>
                        <td>Kasir</td>
                        <td class="px-5" >: {{$pemesanan->name}}</td>
                        
                      </tr>
                      @endforeach
                </table>

                
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden  sm:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider text-center">
                              Nama Layanan
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider text-center">
                                Jenis
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider text-center">
                              Harga
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($layanans as $layanan)
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$layanan->nama_layanan}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 ">
                                {{$layanan->nama_jenis}}
                              </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Rp{{ number_format($layanan->harga,0,',','.') }}
                            </td>
                          </tr>
                          @endforeach
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap ">
                               Total
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                               
                              </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-500 font-bold">
                             Rp{{ number_format($totalAwalLayanan,0,',','.') }}
                            </td>
                          </tr>
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap ">
                             
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                             
                                Diskon({{$totals->diskon}}%)
                             
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-500 font-bold">
                              Rp{{ number_format($totals->harga_paket,0,',','.') }}
                            </td>
                          </tr>
              
                    
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              {{-- end table --}}
              <div class="flex w-full justify-between mt-4">
                <a href="/pemesanan" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    <i class="fas fa-angle-left" ></i> Kembali
                </a>
                @if($bayar->status_bayar == 0)
                <a href="{{ route('bayar.konfirmasi',$id) }}"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                 Bayar<i class="fas fa-angle-right"></i>
                </a>
                    
                @else
                <a href="{{ route('cetak.struk',$id) }}"  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                    Cetak Struk<i class="fas fa-angle-right"></i>
                </a>
                @endif
              </div>
        </div>
    </div>    
</x-app-layout>
