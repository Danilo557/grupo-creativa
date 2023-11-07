<div class="mb-5">
    <x-wire.card title="Sizes">

        <div class="grid grid-cols-2 gap-4 pb-6">

            <x-wire.inputs.currency label="high" placeholder="high" wire:model.defer="high" />

            <x-wire.inputs.currency label="width" placeholder="width" wire:model.defer="width" />
            
            <x-wire.inputs.currency label="price" placeholder="price" icon="currency-dollar" thousands="," decimal="."
                precision="4" wire:model.defer="price" />
            
            <x-wire.select label="Search a unit" wire:model.defer="unit_id" placeholder="Select some unit"
                :async-data="route('admin.units.select')" option-label="name" option-value="id" />


            <div class="col-span-2">
                 

                <x-wire.button icon="plus-sm" secondary    wire:click="add" wire:loading.attr="disabled" wire:target="add"
                        class="disabled:opacity-25" />
            </div>


        </div>
        <div class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
            @foreach ($sizes as $size)
            <div
                class="w-full px-4 py-2 border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 grid grid-cols-4 gap-4">
                <div class="col-span-3">
                {{$size->high}} x {{$size->width}} {{$size->unit->name}}
                </div>
                <div class="col-span-1">
                    <x-wire.button negative   class="float-right" icon="trash" wire:click="deleteSize({{$size}})" wire:loading.attr="disabled" wire:target="deleteSize" class="disabled:opacity-25" />
                </div>
            </div>
            @endforeach
        </div>



    </x-wire.card>

</div>