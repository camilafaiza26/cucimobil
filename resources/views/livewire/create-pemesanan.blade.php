<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Pemesanan') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data pemesanan baru') }}
        </x-slot>

        <x-slot name="form">
          
                <div class="form-group col-span-6 sm:col-span-5 ">
                <x-jet-label for="pelanggan_id" value="{{ __('Nama pemesanan') }}" />
                <x-jet-input id="pelanggan" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="pemesanan.pelanggan_id" placeholder="Masukkan nama" />
                <x-jet-input-error for="pemesanan.pelanggan_id" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5 ">
                <x-jet-label for="nohp" value="{{ __('Paket') }}" />
                <x-jet-input id="nohp" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="pemesanan.nohp" placeholder="Masukkan nohp" />
                <x-jet-input-error for="pemesanan.nohp" class="mt-2" />
            </div>
          
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="plat" value="{{ __('Plat') }}" />
            <x-jet-input id="plat" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="pemesanan.plat" placeholder="Masukkan plat mobil" />
            <x-jet-input-error for="pemesanan.plat" class="mt-2" />
        </div>

        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="merek_id" value="{{ __('Merek Mobil') }}" />
            <textarea id="merek_id" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan merek"  wire:model.defer="pemesanan.merek_id"></textarea>
            <x-jet-input-error for="pemesanan.merek_id" class="mt-2" />
        </div>
    </div>
      
    <input list="browsers" name="browser">
    <datalist id="browsers">
      <option value="Internet Explorer">
      <option value="Firefox">
      <option value="Chrome">
      <option value="Opera">
      <option value="Safari">
    </datalist>
    
    <div wire:ignore>
        <select class="form-control" id="select2-dropdown">
            <option value="">Pilih Nama Pelanggan</option>
            @foreach ($pelanggans as $pelanggan)
            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
            @endforeach
        </select>
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
