<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotplate Jago')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4">
        <!-- Navbar -->
        <nav class="bg-yellow-500 p-4 text-white">
            <a href="/" class="font-bold text-xl">Hotplate Jago</a>
            <a href="/about" class="ml-4 hover:text-red-500">About</a>
        </nav>

        <!-- Main Content -->
        <div class="py-8">
            @yield('content')
        </div>
    </div>
</body>
</html>
