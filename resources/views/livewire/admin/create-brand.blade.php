<div class="content">
    <x-wire.button href="{{ route('admin.brands.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="New Brand">
        <div class="grid grid-cols-1 gap-4 mb-4">
            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">!imagen cargando!</strong>
                <span class="block sm:inline">Estere un momento hasta que la imagen se cargue</span>

            </div>
            @if ($image)
                <img class="mx-auto object-cover w-full h-48 mb-4" src="{{ $image->temporaryUrl() }}">
            @endif
            <input type="file" wire:model="image" id="{{$identificador}}">
            <x-input-error for="image" />
            <x-wire.input wire:model="name" label="Name" placeholder="Name" />
            <x-wire.input wire:model="slug" label="Slug" placeholder="Slug" readonly class="bg-gray-100" />
            <x-wire.color-picker wire:model="color" label="Color" placeholder="Color" />
            <x-wire.textarea wire:model="description" label="Description" placeholder="Description" />


        </div>
        <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
            Create
        </x-button>

    </x-wire.card>
</div>
