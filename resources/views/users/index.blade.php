<x-admin-layout>
    <div class="content">
        <div class="mt-10"></div>
        <x-wire.card shadow=" shadow-md">
            <h2 class="text-2xl text-bold text-gray-600 mb-3">Users</h2>
            @livewire('user-table')
        </x-wire.card>
    </div>
</x-admin-layout>
