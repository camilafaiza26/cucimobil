<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Laporan Pendapatan Harian') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>Laporan Harian</a></div>
        </div>
    </x-slot>

    <div>
       <livewire:table.main name="harian" :model="$harian" />
    </div>
</x-app-layout>
