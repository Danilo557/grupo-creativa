<div class="relative">
    <!-- Dropdown toggle button -->
    <a class="flex items-center hover:text-gray-200" wire:click="open_close()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>


    </a>

    <!-- Dropdown menu -->
    <div
        class="absolute  right-0 z-20 w-56 py-2 mt-5 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800 {{ $open == true ? '' : 'hidden' }}">
        <a href="#"
            class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
            <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                alt="jane avatar">
            <div class="mx-1">
                <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Jane Doe</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">janedoe@exampl.com</p>
            </div>
        </a>

        <hr class="border-gray-200 dark:border-gray-700 ">

        @auth
            <a href="{{ route('orders.index') }}"
                class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                Orders
            </a>
        @endauth


        <a href="#"
            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
            Settings
        </a>


        @auth
            <form method="POST" action="{{ route('logout') }}" x-data
                class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                @csrf
                <button href="{{ route('logout') }}">

                    {{ __('Log Out') }}
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                Log in
            </a>
        @endauth


    </div>
</div>
