<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Loyalitas Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Loyalitas Baru</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('loyality.store') }}" method="POST">
                @csrf

                <!-- ID Pelanggan -->
                {{-- <div class="mb-4">
                    <label for="id_pelanggan" class="block text-gray-700">ID Pelanggan</label>
                    <input type="text" name="id_pelanggan" id="id_pelanggan" 
                           class="w-full px-4 py-2 border rounded-lg" 
                           value="{{ old('id_pelanggan') }}" required>
                </div> --}}

                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <!-- No Handphone -->
                <div class="mb-4">
                    <label for="no_handphone" class="block text-gray-700">No Handphone</label>
                    <input type="text" name="no_handphone" id="no_handphone" class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <!-- Kode Referal -->
                {{-- <div class="mb-4">
                    <label for="kode_referal" class="block text-gray-700">Kode Referal</label>
                    <input type="text" name="kode_referal" id="kode_referal" class="w-full px-4 py-2 border rounded-lg">
                </div> --}}

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Simpan</button>
            </form>
        </div>
    </main>
</div>

</body>
</html>
