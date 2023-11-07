<div>
    <x-wire.button href="{{ route('admin.ideals.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="New Ideal">
        <div class="grid grid-cols-1 gap-4">
            <x-wire.input right-icon="pencil" label="Name" placeholder="name" wire:model="name" />
            <x-wire.input right-icon="ban" label="Slug" placeholder="slug" class="bg-gray-100" disabled
                wire:model="slug" />
            <div>

                <div wire:loading wire:target="image"
                    class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full"
                    role="alert">
                    <strong class="font-bold">!imagen cargando!</strong>
                    <span class="block sm:inline">Estere un momento hasta que la imagen se cargue</span>

                </div>

                @if ($image)
                    <img class="mx-auto object-cover w-24 h-24 mb-4" src="{{ $image->temporaryUrl() }}">
                
                    
                @endif
                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-input-error for="image" />
            </div>
        </div>

        <x-slot name="footer">
            <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Save
            </x-button>
        </x-slot>
    </x-wire.card>
</div>
