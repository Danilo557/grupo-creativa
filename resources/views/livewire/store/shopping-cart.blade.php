<div class="container py-8 mx-auto">
    <x-wire.card title=" Carro de compras">
        @if (Cart::count())
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4"
                                        src="{{ Storage::url($item->options->image) }}" alt="">
                                    <div>
                                        <p class="font-bold">{{ $item->name }}</p>
                                        @if ($item->options->color)
                                            <span>{{ __($item->options->color) }}</span>
                                        @endif
                                        @if ($item->options->size)
                                            <span class="mx-2">-</span>
                                            <span>{{ $item->options->size }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span> {{ Currency::currency('USD')->format($item->price) }}</span>
                                {{-- Delete item  --}}
                                <a class="ml-2 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{ $item->rowId }}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{ $item->rowId }}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                @livewire('store.update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                            </td>
                            <td class="text-center">
                                {{ Currency::currency('USD')->format($item->price * $item->qty) }}
                            </td>
                    @endforeach
                </tbody>
                </thead>
            </table>

            <a class="text-base cursor-pointer hover:underline mt-5 block hover:text-red-700" wire:click="distroy">
                <i class="fas fa-trash"></i>
                Borrar Carrito de compras
            </a>
        @else
            <div class="flex flex-col items-center">
                <i class="fas fa-shopping-bag text-black text-3xl"></i>
                <p class="text-lg text-gray-500 uppercase my-4 ">Tu carro de compras esta vacio</p>
                <x-wire.button dark href="/" class="px-16">
                    Ir al inicio
                </x-wire.button>
            </div>
        @endif
    </x-wire.card>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        Total:
                        <span class="text-lg font-bold">${{ Cart::subTotal() }}</span>
                    </p>
                </div>
                <div>
                    <x-wire.button negative href="{{ route('orders.create') }}">
                        Continuar
                    </x-wire.button>
                </div>
            </div>
        </div>
    @endif
</div>
