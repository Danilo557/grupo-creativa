            <footer class="lazy"
                data-bg-multi=" linear-gradient(180deg, rgba(242, 242, 240,0.8) 0%, rgba(242, 242, 240,0.95) 10%, rgba(242, 242, 240,1) 100%),url({{ asset('assets/img/patron_creativa_log.webp') }})">
                <div class="container px-6 py-8 mx-auto">
                    <div class="grid lg:grid-cols-9 grid-cols-1 gap-x-12 content-center">
                        <div class="lg:col-span-3 col-span-1">
                            <div>
                                <img class="h-36  mx-auto" src="{{ asset('assets/img/logo_creativa_fooder.svg') }}">
                                <p class=" text-sm text-black text-center">
                                    Somos una empresa que ama transformar los espacios en lugares que inspiren.
                                </p>
                            </div>

                        </div>
                        <div class="lg:col-span-6 col-span-1">
                            <div class="flex flex-col items-center text-center">

                                <div class="flex flex-wrap justify-between mt-6 -mx-4">
                                    @foreach ($brands as $brand)
                                        <a href="{{route('store.brands',$brand)}}"
                                            class="mx-4 text-base font-bold text-gray-600 transition-colors duration-300 hover:text-red-800 dark:text-gray-300 "
                                            aria-label="Reddit"> {{$brand->name}} </a>
                                    @endforeach
                                    
                                </div>



                            </div>
                            <hr class="my-6 border-red-800 md:my-10 " />
                            <div class="grid lg:grid-cols-2 grid-cols-1">
                                <div></div>
                                <div>
                                    <div class="flex justify-between mx-3 text-red-800">
                                        <a class="hover:opacity-75"  target="_blank" rel="noreferrer" href="https://www.instagram.com/grupocreativamex/">
                                            <span class="sr-only"> Instagram </span>
                                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fillRule="evenodd"
                                                    d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"
                                                    clipRule="evenodd" />
                                            </svg>
                                        </a>

                                        <a class="hover:opacity-75"  target="_blank" rel="noreferrer" href="https://www.pinterest.com.mx/GrupoCreativaMex/">
                                            <span class="sr-only"> Twitter </span>
                                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path
                                                    d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.564 4.2C8.334 4.2 6.2 7.33 6.2 9.941c0 1.581.58 2.987 1.823 3.51.204.087.387.004.446-.23l.182-.737c.05-.197.041-.285-.066-.432l-.062-.08c-.359-.436-.588-1.001-.588-1.802 0-2.322 1.683-4.402 4.384-4.402 2.39 0 3.704 1.508 3.704 3.522 0 2.65-1.136 4.887-2.822 4.887-.932 0-1.629-.795-1.406-1.77.268-1.165.786-2.42.786-3.262 0-.752-.391-1.38-1.2-1.38-.953 0-1.718 1.017-1.718 2.38 0 .867.284 1.453.284 1.453l-1.145 5.008c-.34 1.487-.051 3.309-.027 3.492.015.11.15.136.212.054l.187-.252c.339-.468 1.036-1.502 1.366-2.568l.055-.188c.109-.409.626-2.526.626-2.526.31.61 1.213 1.145 2.175 1.145 2.862 0 4.804-2.693 4.804-6.298 0-2.726-2.237-5.265-5.636-5.265z" />
                                            </svg>
                                        </a>
                                        <a class="hover:opacity-75"  target="_blank" rel="noreferrer" href="https://www.facebook.com/GrupoCreativaMex/">
                                            <span class="sr-only"> Facebook </span>
                                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fillRule="evenodd"
                                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                                    clipRule="evenodd" />
                                            </svg>
                                        </a>
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center sm:flex-row justify-center bg-black ">
                    <p class="text-sm text-white p-4 text-center">
                        Copyright © {{ Carbon\Carbon::now()->format('Y');}} Grupo Creativa. Todos los derechos reservados. Famtex S de RL de CV. Km 95
                        Carretera Federal Puebla-México Juan C Bonilla, Puebla 72640.

                    </p>


                </div>
            </footer>
