<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Area Konten -->
    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Menu</h1>
            <a href="{{ route('menu.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Tambah Menu Baru</a>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search bar -->
        <form action="{{ route('menu.index') }}" method="GET" class="mb-4">
            <div class="flex">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari menu..." 
                    class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-r-lg"
                >
                    Cari
                </button>
            </div>
        </form>

        <!-- Tabel Menu -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">ID Menu</th>
                        <th class="px-6 py-3 text-left">Nama Menu</th>
                        <th class="px-6 py-3 text-left">Jenis Menu</th>
                        <th class="px-6 py-3 text-left">Harga</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $item->id_menu }}</td>
                            <td class="px-6 py-4">{{ $item->nama_menu }}</td>
                            <td class="px-6 py-4">{{ $item->jenis_menu }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('menu.edit', $item->id_menu) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a> -->
                                <form action="{{ route('menu.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">Tidak ada menu yang ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center items-center">
            {{ $menu->appends(['search' => request('search')])->links('pagination::tailwind') }}
        </div>
    </main>
</div>

</body>
</html>
