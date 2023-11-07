<div>
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css"
            integrity="sha512-c7jR/kCnu09ZrAKsWXsI/x9HCO9kkpHw4Ftqhofqs+I2hNxalK5RGwo/IAhW3iqCHIw55wBSSCFlm8JP0sw2Zw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    <img class="h-screen w-full object-fill mt-5 bg-white" src="{{ Storage::url($brand->image_url) }}">

    <section>
        <div class="content">
            <p class="text-center md:text-3xl text-xl text-gray-600">
                {{ $brand->description }}
            </p>
        </div>
    </section>

    <section>
        <div class="content">
            @foreach ($brand->products as $product)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class=" {{ fmod($loop->index, 2) ? 'order-2' : '' }}">

                        <p class="text-2xl font-semibold mb-4 text-center md:text-start">
                            <span class="text-secondary-500">
                                {{ $product->category->name }}
                            </span>
                            <span class=" megante" style="color: {{ $brand->color }}">
                                {{ $product->name }}
                            </span>

                        </p>
                        <hr class="linea-articulo">
                    </div>
                    <div>

                    </div>


                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-24">
                    <div class=" {{ fmod($loop->index + 1, 2) ? 'order-1' : '' }}">
                        <div class="slider">
                            <div class="flexslider">
                                <ul class="slides">
                                    @foreach ($product->images as $image)
                                        <li data-thumb="{{ Storage::url($image->url) }}">
                                            <img src="{{ Storage::url($image->url) }}" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <p class="text-lg text-gray-500 mb-4 font-semibold">
                            Consíguelo en:
                        </p>

                        <div class="grid grid-cols-4 gap-4">
                            @foreach ($product->stores as $store)
                                <a class="hover:cursor-pointer" target="_blank"
                                    href="{{ $product->stores->find($store->id)->pivot->url }}">
                                    <img src="{{ Storage::url($store->image_url) }}">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <ul class="caracteristica pb-4">
                            @foreach ($product->features as $feature)
                                <li>
                                    <i class="fas fa-square" style="color: {{ $brand->color }}"></i>
                                    {{ $feature->name }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="grid grid-cols-6 grid-flow-col gap-4 mb-6">
                            <div class="col-span-1 ">
                                <img class="h-16" src="{{ asset('assets/img/features/creativa_icn_color.svg') }}">
                            </div>
                            <div class="col-span-5 flex items-center">
                                <p class="text-lg font-normal">
                                    {{ $product->getColors() }}
                                </p>
                            </div>

                        </div>

                        <div class="grid grid-cols-6 grid-flow-col gap-4 mb-8">
                            <div class="col-span-1 ">
                                <img class="h-16" src="{{ asset('assets/img/features/creativa_icn_material.svg') }}">
                            </div>
                            <div class="col-span-5 flex items-center">
                                <p class="text-lg font-normal">
                                    {{ $product->getMaterials() }}
                                </p>
                            </div>

                        </div>

                        <div class="grid grid-cols-6 grid-flow-col gap-4 mb-8">
                            <div class="col-span-1 ">
                                <img class="h-16" src="{{ asset('assets/img/features/creativa_icn_tamano.svg') }}">
                            </div>
                            <div class="col-span-5 flex items-center">
                                <p class="text-lg font-normal sizes">
                                    {!! $product->getSizes($brand->color) !!}
                                </p>
                            </div>

                        </div>

                        <div class="grid grid-cols-6 grid-flow-col gap-4 mb-8 mr-5">
                            <div class="col-span-1 ">
                                <p class="font-semibold text-lg text-gray-500">
                                    Ideal para:
                                </p>
                            </div>
                            <div class="col-span-5">
                                <div class="grid grid-cols-4 gap-4">
                                    @foreach ($product->ideals as $ideal)
                                        <img class="w-full h-24" src={{ Storage::url($ideal->image_url) }}>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- @livewire('store.add-cart-item-size', ['product' => $product], key('add-cart-item-size'.$product->id)) --}}

                        @livewire('store.button-add', ['product' => $product], key('button-add-'.$product->id))



                        <x-dialog-modal wire:model="open">
                            <x-slot name="title">
                                Add
                            </x-slot>
                            <x-slot name="content">
                                Contendi
                            </x-slot>
                            <x-slot name="footer">
                                Contendi
                            </x-slot>

                        </x-dialog-modal>



                    </div>



                </div>
            @endforeach

        </div>
    </section>
    @push('js')
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.min.js"
            integrity="sha512-DMVsZXgX4yFXz69Stig0g783PuBnl245OQV2qj5gSHTVUAuSeqRolBbaqiungKghnEPYee081WTTN6WA4BPYww=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails",
                    start: function(slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
    @endpush
</div>
