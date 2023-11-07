<div>
    <x-wire.card class="shadow-lg">


        <div class="grid grid-cols-1 gap-4">
            <h2 class="text-2xl text-gray-500 font-bold">
                Stores
            </h2>

            <x-wire.select wire:model.defer="store_id" label="Storage" placeholder="Select store">
                @foreach ($stores as $store)
                    <x-wire.select.user-option src="{{ Storage::url($store->image->url) }}" label="{{ $store->name }}"
                        value="{{ $store->id }}" />
                @endforeach
                </x-select>



                <x-wire.input wire:model.defer="url" right-icon="globe-alt" label="Name"
                    placeholder="https://www.website.com" />
                <div>
                    @error('stores_list.*')
                        <div class="text-sm text-red-500 mb-3">
                            Tienda duplicada
                        </div>
                    @enderror
                    <x-wire.button icon="plus-sm" secondary    wire:click="add" wire:loading.attr="disabled" wire:target="add"
                        class="disabled:opacity-25" />
                </div>


                <div
                    class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($stores_list as $item)
                        <div
                            class="block w-full px-4 py-5 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                            <div class="flex justify-around  items-center">
                                <div class="w-3/6">
                                    <figure class="max-w-lg">
                                        <img class="h-24 max-w-full rounded-lg"
                                            src="{{ Storage::url($item->image_url) }}" alt="image description">
                                    </figure>
                                </div>
                                <a class="w-2/6" target="_blank" href="{{$this->product->stores->find($item->id)->pivot->url}}">  {{ $item->name }} </a>
                                <div class="w-1/6 px-3">
                                <x-wire.button red icon="trash" wire:click="deleteStore({{$item}})" wire:loading.attr="disabled" wire:target="deleteStore"
                                    class="disabled:opacity-25 float-right" /></div>

                            </div>

                        </div>
                    @endforeach


                </div>

        </div>




    </x-wire.card>
</div>
