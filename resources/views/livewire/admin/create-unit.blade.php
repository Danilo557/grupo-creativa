<div class="container">
    <x-wire.button href="{{ route('admin.units.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="New Unit">
        <div class="grid grid-cols-1 gap-4 mb-4">
            <x-wire.input right-icon="pencil" label="Name" placeholder="name" wire:model="name" />
            <x-wire.input right-icon="ban" label="Slug" placeholder="slug" wire:model="slug" class="bg-gray-100" readonly />
        </div>
        <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
            Save
        </x-button>
    </x-wire.card>
</div>
