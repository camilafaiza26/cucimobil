<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Pelanggan Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item "><a href="{{ route('pelanggan') }}">Daftar Pelanggan</a></div>
            <div class="breadcrumb-item active "><a>Pelanggan Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-pelanggan action="createPelanggan" />
    </div>
</x-app-layout>
