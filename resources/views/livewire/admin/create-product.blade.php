<div>
    <x-wire.button href="{{ route('admin.products.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="Products">
        <div class="grid grid-cols-1 gap-4">
        
            <x-wire.input right-icon="pencil" label="Name" placeholder="name" wire:model.defer="name" />
             
            <x-wire.select label="Search a Brand" placeholder="Select some brand"
                :async-data="route('admin.brands.select')" option-label="name" option-value="id"
                wire:model.defer="brand_id" />
            <x-wire.select label="Search a Category" placeholder="Select some category"
                :async-data="route('admin.category.select')" option-label="name" option-value="id"
                wire:model.defer="category_id" />

            <x-wire.select name="features[]" wire:model.defer="features" multiselect label="Search a Feature"
                placeholder="Select some feature" :async-data="route('admin.features.select')" option-label="name"
                option-value="id" />
            <x-wire.select name="ideals[]" wire:model.defer="ideals" multiselect label="Search a Ideals"
                placeholder="Select some Ideals" :async-data="route('admin.ideals.select')" option-label="name"
                option-value="id" />
            <x-wire.select name="colors[]" wire:model.defer="colors" multiselect label="Search a Colors"
                placeholder="Select some Ideals" :async-data="route('admin.colors.select')" option-label="name"
                option-value="id" />
            <x-wire.select name="materials[]" wire:model.defer="materials" multiselect label="Search a Materials"
                placeholder="Select some Materials" :async-data="route('admin.materials.select')" option-label="name"
                option-value="id" />






        </div>
    
    
    <x-slot name="footer">
        <x-button wire:click="createproduct" wire:loading.attr="disabled" wire:target="createproduct"
            class="disabled:opacity-25">
            Create
        </x-button>

    </x-slot>
    </x-wire.card>



    
     






</div>