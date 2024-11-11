<!-- resources/views/stock/index.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Bahan</h1>
            <a href="{{ route('stock.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Tambah Stock Baru</a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">ID Stok</th>
                        <th class="px-6 py-3 text-left">ID User</th>
                        <th class="px-6 py-3 text-left">Nama Barang</th>
                        <th class="px-6 py-3 text-left">Jenis Barang</th>
                        <th class="px-6 py-3 text-left">Jumlah Barang</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bahan as $item)
<tr class="border-b">
    <td class="px-6 py-4">{{ $item->id_stok }}</td>
    <td class="px-6 py-4">{{ $item->id_user }}</td>
    <td class="px-6 py-4">{{ $item->nama_barang }}</td>
    <td class="px-6 py-4">{{ $item->jenis_barang }}</td>
    <td class="px-6 py-4">{{ $item->jumlah_barang }}</td>
    <td class="px-6 py-4 flex space-x-2">
    <a href="{{ route('stock.edit', $item->id_stok) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
    <form action="{{ route('stock.destroy', $item->id_stok) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bahan ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
</form>
    </td>
</tr>
@endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>
