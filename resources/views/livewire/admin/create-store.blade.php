<div>
    <x-wire.button href="{{ route('admin.stores.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="new store">
        <div class="grid grid-cols-1 gap-4">
            <div wire:loading wire:target="image" class="alert-load-image" role="alert">
                <strong class="font-bold">!imagen cargando!</strong>
                <span class="block sm:inline">Estere un momento hasta que la imagen se cargue</span>
            </div>

            @if ($image)
                <img class="mx-auto object-cover w-full h-48 mb-4" src="{{ $image->temporaryUrl() }}">
            @endif

            <input type="file" wire:model="image" id="{{$identificador}}">
            <x-input-error for="image" />

            <x-wire.input right-icon="pencil" label="Name" placeholder="name" wire:model="name" />
            <x-wire.input right-icon="pencil" label="Slug" placeholder="slug" wire:model="slug" disabled
                class="bg-gray-100" />
        </div>
        <x-slot name="footer">
            <div class="flex justify-between items-center">
                <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                    Create
                </x-button>
            </div>
        </x-slot>
    </x-wire.card>
</div>
