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
            <x-jet-label for="diskon" value="{{ __('Diskon Paket') }}" />
            <x-jet-input id="diskon" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="paket.diskon" placeholder="Masukkan diskon paket" />
            <x-jet-input-error for="paket.diskon" class="mt-2" />

        </div>
        <button class=" btn text-white btn-info btn-sm mr-2" wire:click.prevent="add({{$i}})"><i class="fas fa-plus"></i></button>
        @foreach($inputs as $key => $value)
                    <select id="layanan_id" class="col-span-5 sm:col-span-4 form-select rounded-md shadow-sm mt-1 block w-full" wire:model.defer="paket.layanan_id.{{$value}}" required>
                    <option hidden selected>--- Pilih Layanan ---</option>
                    @foreach ($layanans as $layanan)
                    <option value="{{$layanan->id}}" >
                       {{$layanan->nama_layanan}} ({{$layanan->nama_jenis}})
                    </option>
                    @endforeach
                </select>
        
                <div class="flex col-span-2 items-center" >
                    <button class=" btn text-white btn-info btn-sm mr-2" wire:click.prevent="add({{$i}})"><i class="fas fa-plus"></i></button>
                    <button class=" btn text-white btn-info btn-sm" wire:click.prevent="remove({{$i}})"><i class="fas fa-minus"></i></button>
                </div>
             
            
            @endforeach
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
