<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Pelanggan') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data pelanggan baru') }}
        </x-slot>

        <x-slot name="form">
        
                <div class="form-group col-span-6 sm:col-span-5 ">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="pelanggan.nama" placeholder="Masukkan nama" />
                <x-jet-input-error for="pelanggan.nama" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5 ">
                <x-jet-label for="nohp" value="{{ __('Nomor Handphone') }}" />
                <x-jet-input id="nohp" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="pelanggan.nohp" placeholder="Masukkan nohp" />
                <x-jet-input-error for="pelanggan.nohp" class="mt-2" />
            </div>
          
       
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
            <textarea id="alamat" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan alamat"  wire:model.defer="pelanggan.alamat"></textarea>
            <x-jet-input-error for="pelanggan.alamat" class="mt-2" />
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
