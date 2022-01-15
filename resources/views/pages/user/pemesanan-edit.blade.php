<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Pemesanan Mobil') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Pemesanan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pemesanan') }}">Edit Pemesanan Cuci Mobil</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-pemesanan action="updatePemesanan" :pemesananId="request()->pemesananId" />
    </div>
</x-app-layout>
