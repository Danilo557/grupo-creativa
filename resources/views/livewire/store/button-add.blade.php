
    <div>
        <!-- Button to open the modal -->
        <button wire:click="$set('open',true) " class="boton-add w-full text-center"> Agregar </button>
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity {{$open?'':'hidden'}}" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="fixed z-10 inset-0 overflow-y-auto {{$open?'':'hidden'}}"  x-cloak>
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal panel -->
                <div class="w-full inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Modal content -->
                        <div class="grid grid-cols-1 gap-4">

                            <x-wire.native-select label="Select Color" wire:model="color_id">
                                @foreach ($product->colors as $color)
                                    @if ($loop->first)
                                        <option value="">Seleccione una opcion</option>
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @else
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endif
                                @endforeach
                            </x-wire.native-select>


                            <x-wire.native-select label="Select Size" wire:model="size_id">
                                @foreach ($product->getArrayList() as $size)
                                    @if ($loop->first)
                                        <option value="">Seleccione una opcion</option>
                                        <option value="{{ $size['id'] }}">{{ $size['size'] }}</option>
                                    @else
                                        <option value="{{ $size['id'] }}">{{ $size['size'] }}</option>
                                    @endif
                                @endforeach
                            </x-wire.native-select>

                            <div class="flex mt-4">
                                <div class="mr-4">

                                    <x-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                                        wire:target="decrement" wire:click="decrement()">-</x-button>
                                    <span class="mx-2 text-gray-700 w-full">{{ $qty }}</span>
                                    <x-button x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                                        wire:target="increment" wire:click="increment()">+</x-button>
                                </div>

                            </div>



                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <div class="grid grid-cols-2 gap-4">


                            <x-wire.button primary label="Agregar" wire:click="addItem" wire:loading.attr="disabled"
                                wire:target="addItem" />

                            <x-wire.button wire:click="$set('open',false) "> Cancel </x-wire.button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
 
