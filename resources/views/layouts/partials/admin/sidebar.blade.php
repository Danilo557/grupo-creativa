<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <h2 class="text-3xl font-semibold mb-6 text-gray-700">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </h2>
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                @if ($link['role'])
                    <li class="">
                        <a href="{{ $link['url'] }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-gray-100 {{ $link['active'] ? 'bg-gray-200' : '' }}">

                            <span class="w-6 h-6 text-gray-500">
                                <i class="{{ $link['icon'] }}"></i>
                            </span>
                            <span class="ml-3">{{ $link['title'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>
