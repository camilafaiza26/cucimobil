<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Merek Mobil') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Merek</a></div>
            <div class="breadcrumb-item"><a href="{{ route('merek') }}">Edit Merek Mobil</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-merek action="updateMerek" :merekId="request()->merekId" />
    </div>
</x-app-layout>
