<x-store-layout>

    <div class="">
        <!-- This is an example component -->

        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        <div id="default-carousel" class="relative" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="overflow-hidden relative h-screen">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out bg-white" data-carousel-item>
                    <span
                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">
                        </span>
                    <img class="lazy" data-src="{{ asset('assets/img/carousel/creativa_banner_inicio_A.webp') }}"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out bg-white" data-carousel-item>
                    <img class="lazy" data-src="{{ asset('assets/img/carousel/creativa_banner_inicio_B.webp') }}"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out bg-white" data-carousel-item>
                    <img class="lazy" data-src="{{ asset('assets/img/carousel/creativa_banner_inicio_C.webp') }}"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out bg-white" data-carousel-item>
                    <img class="lazy" data-src="{{ asset('assets/img/carousel/creativa_banner_inicio_D.webp') }}"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->

            <!-- Slider controls -->
            <button type="button"
                class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black dark:bg-gray-800/30  dark:group-hover:bg-gray-800/60 group-focus:ring-4  dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button"
                class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-black dark:bg-gray-800/30  dark:group-hover:bg-gray-800/60 group-focus:ring-4  dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
        </div>
    </div>

    <section>
        <div class="content">
            <p class=" md:text-4xl text-2xl text-center text-gray-700">
                <span class="font-semibold"> No hay dos como nosotros:</span> somos una
                <span class="font-semibold italic">empresa orgullosamente mexicana</span>, con el
                <span class="font-semibold">talento capacidad</span> y
                <span class="font-semibold">conocimiento</span> para crear los
                <span class="font-semibold">mejores tapetes</span> hechos en México a
                <span class="font-semibold">nivel mundial.</span>
            </p>
        </div>

    </section>

    <section>
        <div class="content">
            <div class="grid sm:grid-cols-2  md:grid-cols-3  lg:grid-cols-4 gap-y-8 -mt-10">

                <div class="img-activate flex justify-center ">
                    <div class="grid grid-cols-1 gap-2">
                        <img class="lazy" data-src="{{ asset('assets/img/mexico1.webp') }}">
                        <p class="text-center">Empresa 100% mexicana</p>
                    </div>
                </div>

                <div class="img-activate flex justify-center ">
                    <div class="grid grid-cols-1 gap-2">
                        <img class="lazy" data-src="{{ asset('assets/img/diseño1.webp') }}">
                        <p class="text-center">Miles de diseño</p>
                    </div>

                </div>

                <div class="img-activate flex justify-center ">
                    <div class="grid grid-cols-1 gap-2">
                        <img class="lazy" data-src="{{ asset('assets/img/hilos1.webp') }}">
                        <p class="text-center">
                            Tecnología de punta
                        </p>
                    </div>

                </div>

                <div class="img-activate flex justify-center ">
                    <div class="grid grid-cols-1 gap-2">
                        <img class="lazy" data-src="{{ asset('assets/img/calidad1.webp') }}">
                        <p class="text-center">
                            Calidad de exportación
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="content ">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 justify-items-center content-center">

                <div class="col-span-2">
                    <p class="text-2xl text-center md:text-end text-gray-500">
                        En <span class="font-semibold"> Grupo Creativa</span> nos distinguimos por la
                        <span class="text-warning-900">calidad</span> y
                        <span class="text-warning-900">variedad</span> de
                        nuestros productos, siempre
                        innovando y a la vanguardia en
                        <span class="font-semibold italic"> tecnologías de confección e impresión.</span>
                    </p>
                </div>

                <div class="col-span-1">
                    <div class="vl"></div>
                </div>
                <div class="col-span-2">
                    <div class="grid sm:grid-cols-1  gap-4 place-items-center">
                        <p class="text-4xl text-center xl:text-start ">
                            Para hacer de tu hogar,
                            <br>
                            <span class="text-warning-800 text-2xl italic">
                                tu lugar favorito.
                            </span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="content">
            <div class="grid grid-cols-1 gap-4 justify-items-center">
                <div class="flex justify-center">
                    <div class="md:w-2/3">
                        <a href="#">
                            <img class="lazy" data-src="{{ asset('assets/img/marcas/marcas_crativa_hm.webp') }}">
                        </a>
                    </div>
                    <div class="md:w-1/3"></div>
                </div>

                <div class="flex justify-center">
                    <div class="md:w-2/3 md:order-last">
                        <a href="#">
                            <img class="lazy" data-src="{{ asset('assets/img/marcas/marcas_crativa_hr.webp') }}">
                        </a>
                    </div>
                    <div class="md:w-1/3"></div>
                </div>

                <div class="flex justify-center">
                    <div class="md:w-2/3">
                        <a href="#">
                            <img class="lazy" data-src="{{ asset('assets/img/marcas/marcas_crativa_pt.webp') }}">
                        </a>
                    </div>
                    <div class="md:w-1/3"></div>
                </div>

                <div class="flex justify-center">
                    <div class="md:w-2/3 order-last">
                        <a href="#">
                            <img class="lazy" data-src="{{ asset('assets/img/marcas/marcas_crativa_hs.webp') }}">
                        </a>
                    </div>
                    <div class="md:w-1/3"></div>
                </div>

                <div class="flex justify-center">
                    <div class="md:w-2/3">
                        <a href="#">
                            <img class="lazy" data-src="{{ asset('assets/img/marcas/marcas_crativa_ss.webp') }}">
                        </a>
                    </div>
                    <div class="md:w-1/3"></div>
                </div>
            </div>

    </section>

    <section>
        <div class="content">
            <h2 class="text-4xl text-warning-900 text-center uppercase font-bold mb-5 md:mb-24 ">clientes</h2>
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4  gap-4 md:gap-10 justify-items-center clients mb-6">
                <div class="flex justify-between items-center">
                    <img class="p-5 lazy" data-src="{{ asset('assets/img/clientes/logs_creativa_wm.webp') }}">
                    <i class="fas fa-circle hidden md:block"></i>
                </div>

                <div class="flex justify-between items-center">
                    <img class="p-5 lazy" data-src="{{ asset('assets/img/clientes/logs_creativa_heb.webp') }}">
                    <i class="fas fa-circle hidden md:block"></i>
                </div>
                <div class="flex justify-between items-center">
                    <img class="p-5 lazy" data-src="{{ asset('assets/img/clientes/logs_creativa_amz.webp') }}">
                    <i class="fas fa-circle hidden md:block"></i>
                </div>
                <div class="flex justify-between items-center">
                    <img class="p-5 lazy" data-src="{{ asset('assets/img/clientes/logs_creativa_ml.webp') }}">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-10  justify-items-center clients">
                <div class="flex justify-between items-center">
                    <img class="p-5 lazy" data-src="{{ asset('assets/img/clientes/logs_creativa_alb.webp') }}">
                    <i class="fas fa-circle hidden md:block"></i>
                </div>

                <div class="flex justify-between items-center">
                    <img class="p-5 lazy" data-src="{{ asset('assets/img/clientes/logs_creativa_lv.webp') }}">
                    <i class="fas fa-circle hidden md:block"></i>
                </div>
                <div class="flex justify-between items-center">
                    <img class="p-5 lazy" data-src="{{ asset('assets/img/clientes/logs_creativa_sc.webp') }}">

                </div>

            </div>
        </div>
    </section>

    <section class="lazy h-screen bg-center bg-no-repeat" data-bg="{{ asset('assets/img/bg_creativa_bn.webp') }}">
        <div class="h-full grid grid-cols-1 content-center">
            <img  class="lazy md:h-72 h-auto w-full bg-center" data-src="{{asset('assets/img/bg_creativa_bn_on.webp')}}">
        </div>
    </section>
</x-store-layout>
