<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-12">
        @auth("web")
            You're a User!
        @endauth

        @auth("admin")
            You're an Admin!
        @endauth

        @guest
            You're not logged in!
        @endguest
    </div>
</x-app-layout>
