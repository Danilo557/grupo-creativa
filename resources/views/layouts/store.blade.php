<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Favicons -->
     <link href="{{asset('assets/img/logo.webp')}}" rel="icon">
     <link href="img/landing/general/apple-touch-icon.webp" rel="apple-touch-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @wireUiScripts
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('css')
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />
    <x-wire.dialog />
    <div class="min-h-screen bg-white lazy bg-repeat-round bg-contain"
        data-bg-multi=" linear-gradient(rgba(255, 255, 255,0.9), rgba(255, 255, 255,0.9)),url({{ asset('assets/img/bg_creativa_11.webp') }})">
        {{-- @livewire('navigation-menu') --}}
        @php

            $brands = App\Models\Brand::with('products')->get();
            $links = [
                [
                    'title' => 'Inicio',
                    'url' => route('store.index'),
                    'active' => request()->routeIs('store.index'),
                    'sub' => null,
                ],
                [
                    'title' => 'Nosotros',
                    'url' => route('store.we'),
                    'active' => request()->routeIs('store.we'),
                    'sub' => null,
                ],
                [
                    'title' => 'Marcas',
                    'url' => route('store.index'),
                    'active' => request()->routeIs('store.index'),
                    'sub' => $brands,
                ],

                [
                    'title' => 'Distribuidor',
                    'url' => route('store.distributor'),
                    'active' => request()->routeIs('store.distributor'),
                    'sub' => null,
                ],

                [
                    'title' => 'Creativa tips',
                    'url' => route('store.tips'),
                    'active' => request()->routeIs('store.tips'),
                    'sub' => null,
                ],
            ];
        @endphp
        <!-- Page Heading -->
        @include('layouts.partials.header')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @include('layouts.partials.footer')
    </div>

    @stack('modals')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.4/dist/lazyload.min.js" defer></script>
    <script>
        window.onload = function() {
            var lazyLoadInstance = new LazyLoad({});
            lazyLoadInstance.update();
        }
    </script>

     
    @stack('js')

    @livewireScripts
</body>

</html>
