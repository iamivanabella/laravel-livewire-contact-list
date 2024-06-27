<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contact List') }}
            </h2>
            <div>
                <x-primary-button :href="route('create-contact')" wire:navigate>{{ __('Add Contact') }}</x-primary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('contacts')
        </div>
    </div>
</x-app-layout>
