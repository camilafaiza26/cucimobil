<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Jenis Mobil') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jenis</a></div>
            <div class="breadcrumb-item"><a href="{{ route('jenis') }}">Edit Jenis Mobil</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-jenis action="updateJenis" :jenisId="request()->jenisId" />
    </div>
</x-app-layout>
