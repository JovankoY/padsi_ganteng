<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotplate Jago')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-yellow-500 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white font-bold text-xl">Hotplate Jago</a>
            <div>
                <a href="/" class="ml-4 text-white hover:text-red-200">Home</a>
                <a href="/about" class="ml-4 text-white hover:text-red-200">About</a>
                <a href="/contact" class="ml-4 text-white hover:text-red-200">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-500 text-white text-center py-3">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-500 text-white text-center py-3">
            {{ session('error') }}
        </div>
    @endif

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <p>&copy; {{ date('Y') }} Hotplate Jago. All rights reserved.</p>
    </footer>

</body>
</html>
