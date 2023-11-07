<div>
    <x-wire.button href="{{ route('admin.categories.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="New Category">
        <div class="grid grid-cols-1 gap-4">
            <x-wire.input right-icon="pencil" label="Name" placeholder="name" wire:model="name" />
            <x-wire.input right-icon="pencil" label="Slug" placeholder="slug" wire:model="slug" disabled
                class="bg-gray-100" />
        </div>

        <x-slot name="footer">
            <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Save
            </x-button>
        </x-slot>
    </x-wire.card>
</div>
