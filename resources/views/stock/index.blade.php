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

        <!-- Search Bar -->
        <form action="{{ route('stock.index') }}" method="GET" class="mb-4">
            <input 
                type="text" 
                name="search" 
                placeholder="Cari Bahan..." 
                value="{{ request('search') }}" 
                class="px-4 py-2 w-full border rounded-lg focus:outline-none focus:border-blue-500"
            >
        </form>

        <!-- Table -->
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
                    @forelse($bahan as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $item->id_bahan }}</td>
                            <td class="px-6 py-4">{{ $item->id_user }}</td>
                            <td class="px-6 py-4">{{ $item->nama_barang }}</td>
                            <td class="px-6 py-4">{{ $item->jenis_barang }}</td>
                            <td class="px-6 py-4">{{ $item->jumlah_barang }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('stock.edit', $item->id_bahan) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                                <form action="{{ route('stock.destroy', $item->id_bahan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bahan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center">Tidak ada data bahan ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            {{ $bahan->links() }}
        </div>
    </main>
</div>

</body>
</html>
