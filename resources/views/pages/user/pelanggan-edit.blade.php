<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Pelanggan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pelanggan') }}" >Daftar Pelanggan</a></div>
            <div class="breadcrumb-item active"><a>Edit Pelanggan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-pelanggan action="updatePelanggan" :pelangganId="request()->pelangganId" />
    </div>
</x-app-layout>
