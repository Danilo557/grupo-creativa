<div x-data="{ open: false }">
    <a @click="open = ! open" class="flex items-center  relative" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span class="flex absolute -mt-5 ml-4">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
            </span>
        </span>


        <div x-show="open" class="absolute w-full  rounded-b border-t-0 z-10 "
            style="right:calc(100% + 80px); top:26px ">
            <div class="shadow-xl w-64">

                @forelse (Cart::content() as $item)
                    <div class="p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100"
                        style="">
                        <div class="p-2 w-12"><img src="{{ Storage::url($item->options->image) }}" alt="img product">
                        </div>
                        <div class="flex-auto text-sm w-32">
                            <div class="font-bold">{{ $item->name }}</div>
                            <div class="text-gray-400">Qt: {{ $item->qty }}</div>
                        </div>
                        <div class="flex flex-col w-18 font-medium items-end">
                            <div class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700" wire:click="delete('{{ $item->rowId }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-trash-2 ">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </div>
                            {{ Currency::currency('USD')->format($item->price) }}
                        </div>
                    </div>
                @empty
                <x-dropdown-link>
                    No hay nada agregado en el carrito de compra
                </x-dropdown-link>
                @endforelse


                @if (Cart::count())
                    <div class="p-4 justify-center flex bg-white">
                        <button onclick="window.location='{{route('shopping-cart')}}'" 
                            class="text-base  undefined  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
    hover:bg-teal-700 hover:text-teal-100 
    bg-teal-100 
    text-teal-700 
    border duration-200 ease-in-out 
    border-teal-600 transition">Ir al carrito de compras <br> 
                            {{ Cart::subtotal() }}</button>
                    </div>
                @endif

            </div>
        </div>
    </a>
</div>
