<div>
    <x-wire.button href="{{ route('admin.categories.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="Update Category">
        <div class="grid grid-cols-1 gap-4">
            <x-wire.input right-icon="pencil" label="Name" placeholder="name" wire:model="name" />
            <x-wire.input right-icon="pencil" label="Slug" placeholder="slug" wire:model="slug" class="bg-gray-100" disabled />
        </div>

        <x-slot name="footer">
            <x-button wire:click="update" wire:loading.attr="disabled" wire:target="update" class="disabled:opacity-25">
                Update
            </x-button>

        </x-slot>
    </x-wire.card>
</div>
