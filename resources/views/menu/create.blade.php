<!-- resources/views/menu/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Menu Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Buat Menu Baru</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('menu.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id_menu" class="block text-gray-700">ID Menu</label>
                    <input type="text" id="id_menu" name="id_menu" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nama_menu" class="block text-gray-700">Nama Menu</label>
                    <input type="text" id="nama_menu" name="nama_menu" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="jenis_menu" class="block text-gray-700">Jenis Menu</label>
                    <input type="text" id="jenis_menu" name="jenis_menu" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700">Harga</label>
                    <input type="number" id="harga" name="harga" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Buat Menu</button>
            </form>
        </div>
    </main>
</div>

</body>
</html>
