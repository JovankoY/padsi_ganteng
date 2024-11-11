<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stock Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Stock Baru</h1>

        <!-- resources/views/stock/create.blade.php -->

        <form action="{{ route('stock.store') }}" method="POST">
    @csrf
    <!-- Input untuk id_stok, id_user, nama_barang, jenis_barang, jumlah_barang -->
    <div class="mb-4">
        <label for="id_stok" class="block text-sm font-medium text-gray-700">ID Stok</label>
        <input type="text" id="id_stok" name="id_stok" class="mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="id_user" class="block text-sm font-medium text-gray-700">ID User</label>
        <input type="text" id="id_user" name="id_user" class="mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang" class="mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="jenis_barang" class="block text-sm font-medium text-gray-700">Jenis Barang</label>
        <input type="text" id="jenis_barang" name="jenis_barang" class="mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="jumlah_barang" class="block text-sm font-medium text-gray-700">Jumlah Barang</label>
        <input type="number" id="jumlah_barang" name="jumlah_barang" class="mt-1 block w-full" required>
    </div>

    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Stok</button>
    </div>
</form>

    </main>
</div>

</body>
</html>
