<x-admin-layout>
    <div class="content">

        <x-wire.button positive class="float-right mb-3" icon="plus" href="{{route('admin.stores.create')}}" />
        <x-wire.card shadow=" shadow-md">
            <h2 class="text-2xl text-bold text-gray-600 mb-3">Stores</h2>
            @livewire('store-table')
        </x-wire.card>
    </div>
</x-admin-layout>
