<x-admin-layout>
    <x-wire.button positive class="float-right mb-3" icon="plus" href="{{route('admin.colors.create')}}" />
    <x-wire.card title="Colors">
         @livewire('color-table')
    </x-wire.card>
</x-admin-layout>
