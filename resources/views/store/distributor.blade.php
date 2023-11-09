<x-store-layout>
    <section class="lazy banner" data-bg="{{ asset('assets/img/banner_distribuidor.webp') }}">
        <div class="content mx-auto">

        </div>
    </section>

    <section>
        <div class="content mx-auto ">
            <div class="flex justify-center">
                <div class="mision lg:w-4/5 w-full">
                    <p class="justify-center text-xl">
                        Nuestros diseños enamorarán a tus clientes.<br />
                        Nuestros precios te encantarán.<br />
                        Nuestra calidad será buscada en tus anaqueles.<br />
                        Nuestros tiempos de entrega te sorprenderán.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="content mx-auto">
            @livewire('store.contact')
        </div>
    </section>
</x-store-layout>
