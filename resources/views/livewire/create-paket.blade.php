<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Paket') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data paket mobil baru') }}
        </x-slot>

        <x-slot name="form">
            
       
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="nama_paket" value="{{ __('Nama Paket') }}" />
            <x-jet-input id="nama_paket" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="paket.nama_paket" placeholder="Masukkan nama paket" />
            <x-jet-input-error for="paket.nama_paket" class="mt-2" />
        </div>
       
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="harga" value="{{ __('Harga Paket') }}" />
            <x-jet-input id="harga" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="paket.harga" placeholder="Masukkan harga paket" />
            <x-jet-input-error for="paket.harga" class="mt-2" />
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="jenis_id" value="{{ __('Masukkan Jenis') }}" />
                <select id="jenis_id" class="form-select block w-full mt-1" wire:model.defer="paket.jenis_id" required>
                <option hidden selected>--- Pilih Jenis ---</option>
                @foreach ($jeniss as $jenis)
                <option value="{{$jenis->id}}" >
                   {{$jenis->nama_jenis}}
                </option>
                @endforeach
            </select>
            </div>

            <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
          


        <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="layanan_id" value="{{ __('Masukkan Layanan') }}" />
                 @foreach($inputs as $key => $value)
                <select id="layanan_id" class="form-select" wire:model.defer="paket.layanan_id.{{$value}}" required>
                <option hidden selected>--- Pilih Layanan ---</option>
                @foreach ($layanans as $layanan)
                <option value="{{$layanan->id}}" >
                   {{$layanan->nama_layanan}}
                </option>
                @endforeach
            </select>
            @endforeach
            </div>

        

        
    </div>


        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
