<!-- resources/views/transaksi.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Content Area -->
    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Daftar Transaksi</h1>
        </div>

        <!-- Tabel Transaksi -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">ID Transaksi</th>
                        <th class="px-6 py-3 text-left">Total Harga</th>
                        <th class="px-6 py-3 text-left">Tanggal Transaksi</th>
                        <th class="px-6 py-3 text-left">Nama Pesanan</th>
                        <th class="px-6 py-3 text-left">ID User</th>
                        <th class="px-6 py-3 text-left">ID Pelanggan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $transaksi)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $transaksi->id_transaksi }}</td>
                        <td class="px-6 py-4">{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $transaksi->tanggal_transaksi }}</td>
                        <td class="px-6 py-4">{{ $transaksi->nama_pesanan }}</td>
                        <td class="px-6 py-4">{{ $transaksi->id_user }}</td>
                        <td class="px-6 py-4">{{ $transaksi->id_pelanggan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>
