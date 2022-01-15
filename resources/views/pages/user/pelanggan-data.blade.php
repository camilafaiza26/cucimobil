<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Daftar Pelanggan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('pelanggan') }}">Data Pelanggan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="pelanggan" :model="$pelanggan" />
    </div>
</x-app-layout>
