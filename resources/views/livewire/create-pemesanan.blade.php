<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Pemesanan') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data pemesanan baru') }}
        </x-slot>

        <x-slot name="form">
          
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="pelanggan_id" value="{{ __('Masukkan Pelanggan') }}" />
                <select id="pelanggan_id" class="form-select block" wire:model.defer="pemesanan.pelanggan_id" required>
                <option hidden selected>--- Pilih Pelanggan ---</option>
                @foreach ($pelanggans as $pelanggan)
                <option value="{{$pelanggan->id}}" >
                   {{$pelanggan->nama}}
                </option>
                @endforeach
            </select>
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="paket_id" value="{{ __('Masukkan Paket') }}" />
                <select id="paket_id" class="form-select" wire:model.defer="pemesanan.paket_id" required>
                <option hidden selected>--- Pilih Paket ---</option>
                @foreach ($pakets as $paket)
                <option value="{{$paket->id}}" >
                   {{$paket->nama_paket}}
                </option>
                @endforeach
            </select>
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="merek_id" value="{{ __('Masukkan Merek') }}" />
                <select id="merek_id" class="form-select" wire:model.defer="pemesanan.merek_id" required>
                <option hidden selected>--- Pilih Merek ---</option>
                @foreach ($mereks as $merek)
                <option value="{{$merek->id}}" >
                   {{$merek->nama_merek}}
                </option>
                @endforeach
            </select>
            </div>

        
          
        <div class="form-group col-span-6 sm:col-span-5 ">
            <x-jet-label for="plat" value="{{ __('Plat') }}" />
            <x-jet-input id="plat" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="pemesanan.plat" placeholder="Masukkan plat mobil" />
            <x-jet-input-error for="pemesanan.plat" class="mt-2" />
        </div>

      
    </div>
      
    
    {{-- <div wire:ignore>
        <select class="form-control" id="select2">
            <option value="">Pilih pelanggan</option>
            @foreach($pelanggans as $pelanggan)
            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
            @endforeach
        </select>
    </div> --}}



   

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
{{-- @push('modals')

<script>
    $(document).ready(function () {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            var item = $('#select2').select2("val");
            @this.set('viralSongs', item);
        });
    });

</script>

@endpush --}}