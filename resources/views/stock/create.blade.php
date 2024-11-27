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
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Stock Baru</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('stock.store') }}" method="POST">
                @csrf

                <!-- Input untuk ID Stok -->
                <div class="mb-4">
                    <label for="id_stok" class="block text-gray-700">ID Stok</label>
                    <input type="text" id="id_bahan" name="id_bahan" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <!-- Input untuk ID User -->
                <div class="mb-4">
                    <label for="id_user" class="block text-gray-700">ID User</label>
                    <input type="text" id="id_user" name="id_user" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <!-- Input untuk Nama Barang -->
                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <!-- Input untuk Jenis Barang -->
                <div class="mb-4">
                    <label for="jenis_barang" class="block text-gray-700">Jenis Barang</label>
                    <input type="text" id="jenis_barang" name="jenis_barang" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <!-- Input untuk Jumlah Barang -->
                <div class="mb-4">
                    <label for="jumlah_barang" class="block text-gray-700">Jumlah Barang</label>
                    <input type="number" id="jumlah_barang" name="jumlah_barang" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                    Simpan Stok
                </button>
            </form>
        </div>
    </main>
</div>

</body>
</html>
