<x-admin-layout>
    <div class="content">
        <x-wire.button positive class="float-right mb-3" icon="plus" href="{{route('admin.roles.create')}}" />
        <x-wire.card title="Role" shadow=" shadow-md">

            @livewire('role-table')
        </x-wire.card>
    </div>
</x-admin-layout>
