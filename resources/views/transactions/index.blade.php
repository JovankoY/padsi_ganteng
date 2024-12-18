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
                <a href="{{ route('transaksi.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                    Add Transaction
                </a>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="table-auto w-full">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="px-6 py-3 text-left">Transaction ID</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left">Menu Name</th>
                            <th class="px-6 py-3 text-left">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $transaksi)
                            <tr class="border-b">
                                <td class="px-6 py-4">{{ $transaksi->id_transaksi }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y H:i') }}</td>
                                
                                <!-- Single cell for Menu that lists all the menu items -->
                                <td class="px-6 py-4">
                                    @foreach($transaksi->detailTransaksi as $detail)
                                        <div>{{ $detail->menu->nama_menu }}</div>
                                    @endforeach
                                </td>
                                
                                <td class="px-6 py-4">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No transactions found</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                    
                </table>
            </div>

            <div class="mt-4">
                {{ $transaksis->links('pagination::tailwind') }}
            </div>
        </main>
    </div>

</body>

</html>
