<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Riwayat Pelanggan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>Pelanggan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="riwayat" :model="$pelanggan" pelangganId="{{$pelangganId}}" />
    </div>
</x-app-layout>
