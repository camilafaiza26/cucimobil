<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Paket Mobil') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Paket</a></div>
            <div class="breadcrumb-item"><a href="{{ route('paket') }}">Edit Paket Mobil</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-paket action="updatePaket" :paketId="request()->paketId" />
    </div>
</x-app-layout>
