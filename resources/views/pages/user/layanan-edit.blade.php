<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Layanan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layanan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('layanan') }}">Edit Layanan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-layanan action="updateLayanan" :layananId="request()->layananId" />
    </div>
</x-app-layout>
