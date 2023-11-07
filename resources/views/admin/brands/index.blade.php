<x-admin-layout>
    <div class="content">
         
        <x-wire.button positive class="float-right mb-3" icon="plus" href="{{route('admin.brands.create')}}" />
        <x-wire.card shadow=" shadow-md">
            <h2 class="text-2xl text-bold text-gray-600 mb-3">Brand</h2>
            @livewire('brand-table')

        </x-wire.card>
    </div>
</x-admin-layout>
