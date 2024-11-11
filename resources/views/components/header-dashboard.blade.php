<header class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-800">{{ $slot }}</h1>
    <div class="flex items-center space-x-4">
        <!-- Profile Section -->
        @if (Auth::check()) 
            <div class="flex items-center space-x-3 px-4 py-2 bg-red-300 rounded-lg shadow">
                <img src="{{ asset('images/rusdi.png') }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                <div class="text-left">
                    <p class="text-md font-semibold text-white">{{ Auth::user()->nama }}</p>
                    <p class="text-sm text-white">{{ Auth::user()->role }}</p>
                </div>
            </div>
        @else
            <div class="flex items-center space-x-3 px-4 py-2 bg-gray-300 rounded-lg shadow">
                <p class="text-sm font-semibold text-gray-600">Guest</p>
            </div>
        @endif
    </div>
</header>
