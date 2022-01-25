<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Laporan Pendapatan Bulanan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>Laporan Bulanan</a></div>
        </div>
    </x-slot>

    <div>
       <livewire:table.main name="bulanan" :model="$bulanan" />
    </div>
</x-app-layout>
