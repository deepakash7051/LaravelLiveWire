<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <p class="m-5 p-5">
            <livewire:item/>
        </p>
    </div>
</x-app-layout>
