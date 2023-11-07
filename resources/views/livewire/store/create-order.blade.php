<div class="container py-8 mx-auto">
    <div class="grid lg:grid-cols-2 gap-6 grid-cols-1">
        <div class="col-span-1">
            <div class="grid lg:grid-cols-1 gap-6 grid-cols-1">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="mb-4">
                        <x-wire.input wire:model.defer="contact" label="Nombre de contacto"
                            placeholder="Ingrese el nombre de la persona que recibe el producto" />
                    </div>
                    <div>
                        <x-wire.input wire:model.defer="phone" label="Teléfono de contacto"
                            placeholder="Ingrese un numero de de teléfono" />
                    </div>
                </div>
                <div>
                    <p class="mt-6 mb-3 text-gray-700 font-semibold  text-lg">Envios</p>
                    <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                        <input type="radio" name="envio_type" value="1" class="text-gray-600"
                            wire:model="envio_type">
                        <span class="ml-2 text-gray-700">Recojo en tienda: calle 123</span><br>
                        <span class="font-semibold text-gray-700 ml-auto">Gratis</span>
                    </label>
                    <div class="bg-white rounded-lg shadow">
                        <label class=" px-6 py-4 flex items-center">
                            <input type="radio" name="envio_type" value="2" class="text-gray-600"
                                wire:model="envio_type">
                            <span class="ml-2 text-gray-700">Envio a domicilio</span>
                        </label>

                        <div class="{{ $envio_type != 2 ? 'hidden' : '' }}">
                            <div class="px-6 pb-6 grid lg:grid-cols-2 grid-cols-1 gap-4 ">
                                <div>
                                    <x-wire.native-select label="Estado" wire:model="state_id">
                                        <option value="" selected disabled>Seleccione una opción</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </x-wire.native-select>
                                </div>
                                <div>
                                    <x-wire.native-select label="Municipio" wire:model="municipality_id">
                                        <option value="" selected disabled>Seleccione una opción</option>
                                        @foreach ($municipalities as $municipality)
                                            <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                                        @endforeach
                                    </x-wire.native-select>
                                </div>
                                <div>
                                    <x-wire.input label="Dirección" wire:model="address" />
                                </div>
                                <div>
                                    <x-wire.input label="Referencia" wire:model="reference" />
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div>
                    <x-button class="mt-6 mb-4" wire:click="createOrder" wire:loading.attr="disabled"
                        wire:target="createOrder">
                        Continuar con la compra.
                    </x-button>
                    <hr />
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum ducimus suscipit accusamus
                        distinctio atque aspernatur recusandae vel similique, consectetur non placeat sequi nobis
                        voluptatum
                        aliquid adipisci incidunt autem dignissimos harum?
                        <a class="font-semibold text-orange-600">Politicas y privacidad</a>
                    </p>
                </div>
            </div>
        </div>


        <div class="col-span-1">
            <div class="bg-white rounded-lg shadow px-6 py-4">
                @forelse (Cart::content() as $item)
                    <x-dropdown-link>
                        <div class="flex">
                            <img class="h-20 w-20 object-cover object-center mr-4"
                                src="{{ Storage::url($item->options->image) }}">
                            <article class="flex-1">
                                <h1 class="font-bold">{{ $item->name }}</h1>
                                <p>Cantidad: {{ $item->qty }}</p>
                                <p>Talla: {{ $item->options->size }}</p>
                                <p>Color: {{ __($item->options->color) }}</p>
                                <p> {{ Currency::currency('USD')->format($item->price, true) }}</p>


                            </article>
                        </div>
                    </x-dropdown-link>
                @empty
                    <x-dropdown-link>
                        No hay nada agregado en el carrito de compra
                    </x-dropdown-link>
                @endforelse

                <hr class="mt-4 mb-3">
                <div class="text-gray-700">
                    <p class="flex justify-between items-center">
                        Subtotal:
                        <span class="font-bold">
                            {{ Currency::currency('USD')->format(Cart::subtotal(2, '.', '')) }}
                        </span>
                    </p>
                    <p class="flex justify-between items-center">
                        Envio
                        <span class="font-bold">
                            @if ($envio_type == 1)
                                Gratis
                            @else
                                {{ Currency::currency('USD')->format($shipping_cost, false) }}
                            @endif
                        </span>
                    </p>
                </div>
                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center font-semibold">
                    Total:
                    <span class="text-lg">
                        @if ($envio_type == 1)
                            {{ Currency::currency('USD')->format(Cart::subtotal(2, '.', '')) }}
                        @else
                            {{Currency::currency('USD')->format(( $shipping_cost + (float) Cart::subtotal(2, '.', '')), false) }}
                        @endif
                    </span>
                </p>
            </div>
        </div>

    </div>
</div>
