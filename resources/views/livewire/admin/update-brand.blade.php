<div>
    <x-wire.button href="{{ route('admin.brands.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="Update Brand">
         
        <div wire:loading wire:target="image"
            class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full h-50" role="alert">
            <strong class="font-bold">!Imagen cargando!</strong>
            <span class="block sm:inline">Estere un momento hasta que la imagen se cargue</span>

        </div>
        @if ($image)
            <img class="mx-auto object-cover w-full h-48 mb-4" src="{{ $image->temporaryUrl() }}">
        @else
            <img class="mx-auto object-cover w-full h-48 mb-4" src="{{ Storage::url($brand->image_url) }}">
        @endif
         
        <div>

            <input class="mb-3" type="file" wire:model="image" id="{{ $identificador }}">
            <x-input-error for="image" />
        </div>
        <div class="mb-3">
            <x-wire.input right-icon="pencil" label="Name" wire:model="brand.name" placeholder="your name" />
        </div>

        <div class="mb-3">
            <x-wire.input right-icon="pencil" label="Slug" wire:model="brand.slug" placeholder="" readonly
                class="bg-gray-100" />
        </div>
        <div class="mb-3">
            <x-wire.color-picker wire:model="brand.color" label="Color" placeholder="Color" />
        </div>
        <div class="mb-3">
            <x-wire.textarea wire:model="brand.description" label="Description" placeholder="Description" />
        </div>



        <x-button wire:click="update" wire:loading.attr="disabled" wire:target="update" class="disabled:opacity-25">
            Update
        </x-button>
    </x-wire.card>
</div>
