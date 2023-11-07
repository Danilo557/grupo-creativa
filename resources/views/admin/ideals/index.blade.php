<x-admin-layout>
    <x-wire.button positive class="float-right mb-3" icon="plus" href="{{route('admin.ideals.create')}}" />
    <x-wire.card title="Ideals">
        @livewire('ideal-table')
    </x-wire.card>
</x-admin-layout>
