<!-- resources/views/stock/edit.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bahan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Bahan</h1>

        <form action="{{ route('stock.update', $bahan->id_stok) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Form Input -->
            <div class="mb-4">
                <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="w-full px-4 py-2 border rounded-lg" value="{{ $bahan->nama_barang }}">
            </div>

            <div class="mb-4">
                <label for="jumlah_barang" class="block text-sm font-medium text-gray-700">Jumlah Barang</label>
                <input type="number" name="jumlah_barang" id="jumlah_barang" class="w-full px-4 py-2 border rounded-lg" value="{{ $bahan->jumlah_barang }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg">Update Bahan</button>
        </form>
    </main>
</div>

</body>
</html>
