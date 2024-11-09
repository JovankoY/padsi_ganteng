<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotplate Jago</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-full">
    <!-- Main Container -->
    <div class="w-full h-screen overflow-hidden">
        <!-- Header -->
        <header class="inset-x-0 top-0 p-6 bg-white z-50 shadow-md">
            <nav class="text-red-600 font-semibold flex item-center justify-between">
                <div class="">
                <img src="{{ asset('images/hotplatelogo.png') }}" alt="Logo" class=" h-10 w-auto">
                </div>
                <div class="space-x-8 flex items-center">
                <a href="{{ route('about') }}" class="hover:text-yellow-500 transition">ABOUT</a>
                <a href="#" class="hover:text-yellow-500 transition">MENU</a>
                <a href="#" class="hover:text-yellow-500 transition">OTHERS</a>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <div class="relative h-screen flex items-center -z-10">
            <div class="absolute buttom-0 inset-x-0 h-screen -z-10">
                <img src="{{ asset('images/hotplate.png') }}" alt="Hotplate Image" class="w-full h-full object-cover object-buttom">
                <!-- Decorative Elements -->
                <div class="absolute top-1/2 right-0 transform -translate-y-1/2 flex space-x-3">
                    <div class="w-8 h-8 bg-yellow-500 rounded-full"></div>
                    <div class="w-8 h-8 bg-red-500 rounded-full"></div>
                </div>

            </div>
            <div class="absolute top-1 z-10 px-60 py-60 flex flex-col items-center ">
            <h1 class="text-7xl font-extrabold text-red-600 text-center">
                HOT PLATE<br>JAGO
            </h1>
            <a href="login" class="bg-yellow-400 text-3xl text-red-600 font-bold py-2 px-8 rounded mt-4 hover:bg-yellow-500 transition">
                LOGIN
            </a>
            </div>
            

            <!-- Fullscreen Image Section with Decorations -->
            
</div>
    </div>
</body>
</html>
