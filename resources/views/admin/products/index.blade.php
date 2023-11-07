<x-admin-layout>
    <x-wire.button positive class="float-right mb-3" icon="plus" href="{{route('admin.products.create')}}" />
    <x-wire.card title="Products">
        @livewire('product-table')
    </x-wire.card>
</x-admin-layout>
