<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Merek Mobil Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Merek</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-merek action="createMerek" />
    </div>
</x-app-layout>
