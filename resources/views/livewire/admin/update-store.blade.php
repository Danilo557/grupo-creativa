<div class="container">
   <x-wire.button icon="arrow-left" primary class="mb-3" href="{{route('admin.stores.index')}}"/>
    <x-wire.card title="Update Store">

        <div class="grid grid-cols-1 gap-4 mb-4">

         
            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">!imagen cargando!</strong>
                <span class="block sm:inline">Estere un momento hasta que la imagen se cargue</span>

            </div>

            @if ($image)
                <img class="mx-auto object-cover w-full h-48 mb-4" src="{{ $image->temporaryUrl() }}">
            @else
                <img class="mx-auto object-cover w-full h-48 mb-4" src="{{ Storage::url($store->image_url) }}">
            @endif


            <input type="file" wire:model="image" id="{{$identificador}}">
            <x-input-error for="image" />


            <x-wire.input right-icon="pencil" label="Name" placeholder="your name" wire:model="name" />
            <x-wire.input right-icon="pencil" label="Slug" placeholder="your name" wire:model="slug" readonly
                class="bg-gray-100" />
        </div>
        <x-button wire:click="update" wire:loading.attr="disabled" wire:target="update" class="disabled:opacity-25">
            Update
        </x-button>
    </x-wire.card>
</div>
