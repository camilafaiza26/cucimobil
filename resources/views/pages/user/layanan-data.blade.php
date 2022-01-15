<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Layanan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>Layanan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="layanan" :model="$layanan" />
    </div>
</x-app-layout>
