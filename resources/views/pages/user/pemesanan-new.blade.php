<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Pemesanan Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item "><a href="{{ route('pemesanan') }}">Daftar Pemesanan</a></div>
            <div class="breadcrumb-item active "><a>Pemesanan Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-pemesanan action="createPemesanan" />
    </div>
</x-app-layout>
