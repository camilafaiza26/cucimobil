<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Merek') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>Merek</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="merek" :model="$merek" />
    </div>
</x-app-layout>
