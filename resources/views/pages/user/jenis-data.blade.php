<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Jenis') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>Jenis</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="jenis" :model="$jenis" />
    </div>
</x-app-layout>
