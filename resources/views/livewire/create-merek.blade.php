<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Merek') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data merek mobil baru') }}
        </x-slot>

        <x-slot name="form">
            
       
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="nama_merek" value="{{ __('Nama Merek Mobil') }}" />
            <x-jet-input id="nama_merek" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="merek.nama_merek" placeholder="Masukkan nama merek mobil" />
            <x-jet-input-error for="merek.nama_merek" class="mt-2" />
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
