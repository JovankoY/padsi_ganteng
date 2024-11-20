<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Transaction List</h1>
            <a href="{{ route('transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Add Transaction
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="table-auto w-full">
    <thead class="bg-gray-100 text-gray-600">
        <tr>
            <th class="px-6 py-3 text-left">Id Transaksi</th>
            <th class="px-6 py-3 text-left">Tanggal Transaksi</th>
            <th class="px-6 py-3 text-left">Nama Menu</th>
            <th class="px-6 py-3 text-left">Harga Menu</th>
            <th class="px-6 py-3 text-left">Jumlah Pesanan</th>
            <th class="px-6 py-3 text-left">Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @forelse($notas as $nota)
            <tr class="border-b">
                <td class="px-6 py-4">{{ $nota->id_transaksi }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($nota->tanggal_transaksi)->format('d-m-Y H:i') }}</td>
                <td class="px-6 py-4">{{ $nota->menu->nama_menu ?? 'Menu not found' }}</td>
                <td class="px-6 py-4">{{ number_format($nota->harga_menu, 0, ',', '.') }}</td>
                <td class="px-6 py-4">{{ $nota->jumlah_pesanan }}</td>
                <td class="px-6 py-4">{{ number_format($nota->total_harga, 0, ',', '.') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-gray-500">No transactions found</td>
            </tr>
        @endforelse
    </tbody>
</table>

        </div>
    </main>
</div>

<!-- Pagination Links -->
<div class="p-4">
    {{ $notas->links() }}
</div>

</body>

</html>
