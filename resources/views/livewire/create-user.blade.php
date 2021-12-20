<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('User') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data user baru') }}
        </x-slot>

        <x-slot name="form">
            
            <div class=" form-group flex flex-wrap col-span-6 sm:col-span-5 ma-0 mb-0" >
                <div class=" form-group  w-full md:w-1/2 ">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.name" placeholder="Masukkan nama" />
                <x-jet-input-error for="user.name" class="mt-2" />
            </div>
            <div class="form-group  md:w-1/2 pl-3 sm:w-2/2">
                <x-jet-label for="nohp" value="{{ __('Nomor Handphone') }}" />
                <x-jet-input id="nohp" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.nohp" placeholder="Masukkan nohp" />
                <x-jet-input-error for="user.nohp" class="mt-2" />
            </div>
          
        </div>
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
            <textarea id="alamat" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan alamat"  wire:model.defer="user.alamat"></textarea>
            <x-jet-input-error for="user.alamat" class="mt-2" />
        </div>

        <div class=" form-group flex flex-wrap col-span-6 sm:col-span-5 ma-0 mb-0" >
            <div class=" form-group  w-full md:w-1/2 ">
            <x-jet-label for="username" value="{{ __('Username') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.username" placeholder="Masukkan username" />
            <x-jet-input-error for="user.username" class="mt-2" />
        </div>

        <div class="form-group  md:w-1/2 pl-3 ">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.email" placeholder="Masukkan email" />
            <x-jet-input-error for="user.email" class="mt-2" />
        </div>
    </div>


            @if ($action == "createUser")
            <div class=" form-group flex flex-wrap col-span-6 sm:col-span-5 ma-0 mb-0" >
                <div class=" form-group  w-full md:w-1/2 ">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <small>Minimal 8 karakter</small>
                <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password" placeholder="Masukkan password" />
                <x-jet-input-error for="user.password" class="mt-2" />
            </div>

            <div class="form-group  md:w-1/2 pl-3 ">
                <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                <small>Minimal 8 karakter</small>
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password_confirmation" placeholder="Masukkan konfirmasi password"/>
                <x-jet-input-error for="user.password_confirmation" class="mt-2" />
            </div>
        </div>
            @endif
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
