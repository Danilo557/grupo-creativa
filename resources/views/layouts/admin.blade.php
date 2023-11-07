<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/flexslider/flexslider.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    @wireUiScripts
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50">
    <x-banner />
    <x-wire.notifications />
    <x-wire.dialog />

    <div class="min-h-screen bg-gray-100">

        @php
            $links = [
                [
                    'title' => 'Dashboard',
                    'url' => route('dashboard'),
                    'active' => request()->routeIs('dashboard'),
                    'icon' => 'fa-solid fa-gauge-high',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],

                [
                    'title' => 'Brands',
                    'url' => route('admin.brands.index'),
                    'active' => request()->routeIs('admin.brands.*'),
                    'icon' => 'fa-solid fa-b',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],
                [
                    'title' => 'Categories',
                    'url' => route('admin.categories.index'),
                    'active' => request()->routeIs('admin.categories.*'),
                    'icon' => 'fa-solid fa-c',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],
                [
                    'title' => 'Colors',
                    'url' => route('admin.colors.index'),
                    'active' => request()->routeIs('admin.colors.*'),
                    'icon' => 'fa-solid fa-swatchbook',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],
                [
                    'title' => 'Products',
                    'url' => route('admin.products.index'),
                    'active' => request()->routeIs('admin.products.*'),
                    'icon' => 'fa-brands fa-product-hunt',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],
                [
                    'title' => 'Units',
                    'url' => route('admin.units.index'),
                    'active' => request()->routeIs('admin.units.*'),
                    'icon' => 'fa-solid fa-u',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],

                [
                    'title' => 'Stores',
                    'url' => route('admin.stores.index'),
                    'active' => request()->routeIs('admin.stores.*'),
                    'icon' => 'fa-brands fa-shopify',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],
                [
                    'title' => 'Ideals',
                    'url' => route('admin.ideals.index'),
                    'active' => request()->routeIs('admin.ideals.*'),
                    'icon' => 'fa-brands fa-ideal',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],

                [
                    'title' => 'Orders',
                    'url' => route('admin.orders.index'),
                    'active' => request()->routeIs('admin.orders.*'),
                    'icon' => 'fa-solid fa-layer-group',
                    'role'=>auth()->user()->hasRole('Admin|Customer'),
                ],

                [
                    'title' => 'Users',
                    'url' => route('admin.users.index'),
                    'active' => request()->routeIs('admin.users.*'),
                    'icon' => 'fa-solid fa-user',
                    'role'=>auth()->user()->hasRole('Admin'),
                ],

                [
                    'title' => 'Roles',
                    'url' => route('admin.roles.index'),
                    'active' => request()->routeIs('admin.roles.*'),
                    'icon' => 'fa-solid fa-users-gear',
                    'role'=>auth()->user()->hasRole('Admin'),
                ],
            ];

        
            
        @endphp

        <div class="flex" x-data="{
            open: false,
            openSiderbar: true
        }">
            <div :class="{ 'lg:block': openSiderbar }" class="w-64 flex-shrink-0 hidden lg:block">
                @include('layouts.partials.admin.sidebar')
            </div>
            <div class="flex-1">
                @include('layouts.partials.admin.navigation')

                <!-- Body -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{ asset('assets/js/slugify.js') }}"></script>
    <script src="{{ asset('assets/js/imageUpload.js') }}"></script>
    <script src="{{ asset('assets/flexslider/jquery.flexslider.js') }}"></script>



    @stack('js')
</body>

</html>
