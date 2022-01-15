<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Jenis') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data jenis mobil baru') }}
        </x-slot>

        <x-slot name="form">
            
       
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="nama_jenis" value="{{ __('Nama Jenis Mobil') }}" />
            <x-jet-input id="nama_jenis" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="jenis.nama_jenis" placeholder="Masukkan nama jenis mobil" />
            <x-jet-input-error for="jenis.nama_jenis" class="mt-2" />
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
