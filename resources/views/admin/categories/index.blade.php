<x-admin-layout>
    <x-wire.button positive class="float-right mb-3" icon="plus" href="{{route('admin.categories.create')}}" />
    <x-wire.card title="Categories">
        @livewire('category-table')
    </x-wire.card>
</x-admin-layout>
