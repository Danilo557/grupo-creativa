<x-store-layout>
    <section class="lazy banner" data-bg="{{ asset('assets/img/creativa-tips.webp') }}">
    </section>
    <section>
        <div class="content mx-auto">
            <div class="shadow-2xl rounded-2xl bg-[#ebebeb]">
                <div class="grid lg:grid-cols-5 grid-cols-1 gap-0 place-content-center">
                    <div class="lg:col-span-3 col-span-1 ">
                        <div class=" mx-auto rounded-xl">
                            <div class="p-10 ">
                                <!-- What is term -->
                                <div class="transition ">
                                    <!-- header -->
                                    <div
                                        class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                        <i class="fas fa-plus"></i>
                                        <h3>
                                            Tapetes de baño:
                                        </h3>
                                    </div>
                                    <!-- Content -->
                                    <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                                        <ul
                                            class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                Lavar a mano con agua fría 30º C
                                            </li>
                                            <li>
                                                Lavar con colores similares o por separado
                                            </li>
                                            <li>
                                                No usar blanqueador
                                            </li>
                                            <li>
                                                No usar cloro
                                            </li>
                                            <li>
                                                Secar colgado a la sombra
                                            </li>
                                            <li>
                                                No secar en máquina
                                            </li>
                                            <li>
                                                No exprimir
                                            </li>
                                            <li>
                                                No planchar
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- When to use Accordion Components -->
                                <div class="transition ">
                                    <!-- header -->
                                    <div
                                        class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                        <i class="fas fa-plus"></i>
                                        <h3>
                                            Tapetes de área:
                                        </h3>
                                    </div>
                                    <!-- Content -->
                                    <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                                        <ul
                                            class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                Aspirar frecuentemente
                                            </li>
                                            <li>
                                                Cepillar en la dirección del pelo
                                            </li>
                                            <li>
                                                Lavar a mano
                                            </li>
                                            <li>
                                                Se puede usar agua y jabón neutro
                                            </li>
                                            <li>
                                                Sacudir para que recupere su forma
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <!-- Accordion Wrapper -->
                                <div class="transition ">
                                    <!-- header -->
                                    <div
                                        class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                        <i class="fas fa-plus"></i>
                                        <h3>
                                            Tapetes de hotelería:
                                        </h3>
                                    </div>
                                    <!-- Content -->
                                    <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                                        <ul
                                            class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                Resisten más de 40 lavadas
                                            </li>
                                            <li>
                                                Lavado industrial
                                            </li>
                                            <li>
                                                Lavar por separado o con colores similares
                                            </li>
                                            <li>
                                                Lavar a máquina con agua fría 30º C
                                            </li>
                                            <li>
                                                Lavar con blanqueador sin cloro.
                                            </li>
                                            <li>
                                                No exprimir
                                            </li>
                                            <li>
                                                Secar en máquina a temperatura baja menor a 50º C
                                            </li>
                                            <li>
                                                No planchar
                                            </li>
                                            <li>
                                                No cepillar
                                            </li>
                                            <li>
                                                Sacudir para que recupere su cuerpo esponjoso
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <!-- Accordion Wrapper -->
                                <div class="transition ">
                                    <!-- header -->
                                    <div
                                        class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                        <i class="fas fa-plus"></i>
                                        <h3>
                                            Tapetes de mascotas
                                        </h3>
                                    </div>
                                    <!-- Content -->
                                    <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                                        <ul
                                            class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                Lavar por separado o con colores similares
                                            </li>
                                            <li>
                                                Lavar a mano con agua fría a 30ºC
                                            </li>
                                            <li>
                                                Lavar con jabón o detergente suave
                                            </li>
                                            <li>
                                                No usar blanqueador ni cloro
                                            </li>
                                            <li>
                                                No usar secadora
                                            </li>
                                            <li>
                                                No exprimir
                                            </li>
                                            <li>
                                                No planchar
                                            </li>
                                           

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-2 col-span-1 bg-[#fafafa] ">
                        <div class="h-full">
                            <img class="h-auto w-64 mx-auto mb-4"
                                src="{{ asset('assets/img/logo_creativa_fooder.svg') }}">
                            <p class="text-xl text-center p-2">
                                Nuestros tapetes han sido diseñados y elaborados con mucha dedicación y amor, por eso te
                                recomendamos seguir con estas sencillas instrucciones de cuidado.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    @push('css')
        <style>
            .accordion-content {
                transition: max-height 0.3s ease-out, padding 0.3s ease;
            }
        </style>
    @endpush
    @push('js')
        <script>
            const accordionHeader = document.querySelectorAll(".accordion-header");
            accordionHeader.forEach((header) => {
                header.addEventListener("click", function() {
                    const accordionContent = header.parentElement.querySelector(".accordion-content");
                    let accordionMaxHeight = accordionContent.style.maxHeight;

                    // Condition handling
                    if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
                        accordionContent.style.maxHeight = `${accordionContent.scrollHeight + 32}px`;
                        header.querySelector(".fas").classList.remove("fa-plus");
                        header.querySelector(".fas").classList.add("fa-minus");
                        //header.parentElement.classList.add("bg-indigo-50");
                    } else {
                        accordionContent.style.maxHeight = `0px`;
                        header.querySelector(".fas").classList.add("fa-plus");
                        header.querySelector(".fas").classList.remove("fa-minus");
                       // header.parentElement.classList.remove("bg-indigo-50");
                    }
                });
            });
        </script>
    @endpush
</x-store-layout>
