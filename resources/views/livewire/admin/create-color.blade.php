<div>
    <x-wire.button href="{{ route('admin.colors.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="New Color">
        <div class="grid grid-cols-1 gap-4">
            <x-wire.input right-icon="pencil" label="Name" placeholder="name" wire:model="name" />
            <x-wire.input right-icon="ban" label="Slug" placeholder="slug" class="bg-gray-100" disabled wire:model="slug" />
            <x-wire.color-picker label="Select a Color" placeholder="Select the car color"  wire:model="code"/>
        </div>

        <x-slot name="footer">
            <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Save
            </x-button>
        </x-slot>
    </x-wire.card>
</div>