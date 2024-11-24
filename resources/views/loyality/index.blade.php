<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Content Area -->
    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Loyalty</h1>
            <a href="{{ route('loyality.create') }}" 
               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Tambah Pelanggan
            </a>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
                <p>{{ session('success')['pesan_pelanggan'] ?? '' }}</p>
                <p>{{ session('success')['pesan_referal'] ?? '' }}</p>
            </div>
        @elseif(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- Referral Code Input -->
        <form action="{{ route('loyality.redeemReferal') }}" method="POST" class="mb-6">
            @csrf
            <div class="flex items-center space-x-2">
                <input 
                    type="text" 
                    name="kode_referal" 
                    value="{{ old('kode_referal') }}" 
                    placeholder="Masukkan kode referal"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                >
                    Redeem
                </button>
            </div>
        </form>

        <!-- Search bar -->
        <form action="{{ route('loyality.index') }}" method="GET" class="mb-4">
            <div class="flex">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari pelanggan..." 
                    class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-r-lg hover:bg-blue-600"
                >
                    Cari
                </button>
            </div>
        </form>

        <!-- Pelanggan Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">No Handphone</th>
                        <th class="px-6 py-3 text-left">Kode Referal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggan as $item)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $item->nama }}</td>
                        <td class="px-6 py-4">{{ $item->no_handphone }}</td>
                        <td class="px-6 py-4">{{ $item->kode_referal }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</div>

</body>
</html>
