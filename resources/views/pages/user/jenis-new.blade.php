<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Jenis Mobil Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jenis</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-jenis action="createJenis" />
    </div>
</x-app-layout>
