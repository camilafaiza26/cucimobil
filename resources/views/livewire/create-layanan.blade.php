<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Layanan') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data layanan baru') }}
        </x-slot>

        <x-slot name="form">
            
       
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="nama_layanan" value="{{ __('Nama Layanan') }}" />
            <x-jet-input id="nama_layanan" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="layanan.nama_layanan" placeholder="Masukkan nama layanan" />
            <x-jet-input-error for="layanan.nama_layanan" class="mt-2" />
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
