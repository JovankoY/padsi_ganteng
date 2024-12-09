<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@heroicons/react/outline" defer></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <x-sidebar></x-sidebar>

        <!-- Content Area -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <x-header-dashboard>Laporan Penjualan</x-header-dashboard>

            <!-- Search and Limit Controls -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-end gap-4">
                    <form action="{{ route('laporan.index') }}" method="GET" id="filter-form"
                        class="flex items-end gap-4">
                        <div>
                            <label for="limit" class="block text-sm font-medium text-gray-700">Limit:</label>
                            <select name="limit" id="limit"
                                class="form-control border border-gray-300 rounded-lg px-4 py-2 shadow mr-2">
                                <option value="5" {{ request('limit') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </div>
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal
                                Mulai</label>
                            <input type="date" name="start_date" id="start_date"
                                value="{{ request('start_date', $startDate) }}"
                                class="border border-gray-300 rounded-lg px-4 py-1.5 shadow mr-2">
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                            <input type="date" name="end_date" id="end_date"
                                value="{{ request('end_date', $endDate) }}"
                                class="border border-gray-300 rounded-lg px-4 py-1.5 shadow mr-2">
                        </div>
                        <div>
                            <label for="id" class="block text-sm font-medium text-gray-700">Pilih User:</label>
                            <select name="id_user" id="id"
                                class="form-control border border-gray-300 rounded-lg px-4 py-2 shadow mr-2">
                                <option value="">Tampilkan Semua</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id_user }}"
                                        {{ request('id_user') == $user->id_user ? 'selected' : '' }}>
                                        {{ $user->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 ml-2 rounded-lg shadow hover:bg-gray-700 transition duration-200">
                            Filter
                        </button>
                    </form>
                </div>
                <div class="flex items-end -mb-6">
                    <a href="{{ route('laporan.penjualan.pdf.all', [
                            'start_date' => request('start_date', $startDate->format('Y-m-d')),
                            'end_date' => request('end_date', $endDate->format('Y-m-d')),
                            'id' => request('id_user')
                        ]) }}" class="flex items-end bg-gray-900 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-700 transition duration-200">
                        Print All Penjualan
                    </a>
                </div>
            </div>

            <!-- Tabel Laporan Penjualan -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg" id="laporan-penjualan">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-yellow-500 text-white">
                            <th class="px-4 py-2 border-b text-left">Nomor Transaksi</th>
                            <th class="px-4 py-2 border-b text-left">Tanggal Transaksi</th>
                            <th class="px-4 py-2 border-b text-left">Total Harga</th>
                            <th class="px-4 py-2 border-b text-left">Nama User</th>
                            <th class="px-4 py-2 border-b text-left">Nama Pelanggan</th>
                            <th class="px-4 py-2 border-b text-left">Detail Menu</th>
                            <th class="px-4 py-2 border-b text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = ($laporanPenjualan->currentPage() - 1) * $laporanPenjualan->perPage() + 1; ?>
                        @foreach ($laporanPenjualan as $penjualan)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border-b">{{ $no++ }}</td>
                                <td class="px-4 py-2 border-b">{{ $penjualan->tanggal_transaksi }}</td>
                                <td class="px-4 py-2 border-b">
                                    Rp{{ number_format($penjualan->total_harga, 2, ',', '.') }}</td>
                                <td class="px-4 py-2 border-b">{{ $penjualan->user->nama ?? 'N/A' }}</td>
                                <td class="px-4 py-2 border-b">{{ $penjualan->pelanggan->nama ?? 'N/A' }}</td>
                                <td class="px-4 py-2 border-b">
                                    <ul>
                                        @foreach ($penjualan->detailTransaksi as $detail)
                                            <li>{{ $detail->menu->nama_menu }} - {{ $detail->jumlah_menu }}pcs</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-3 py-1 border-b">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('laporan.penjualan.detail', $penjualan->id_transaksi) }}"
                                            class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"
                                                stroke="currentColor" class="w-3 h-3 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 9h3m0 0h3m-3 0v3m0-3V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2h-3a2 2 0 00-2 2v3z" />
                                            </svg>
                                            <span>Detail</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $laporanPenjualan->links() }}
            </div>
        </main>
    </div>

    <script>
        // Function to submit form on change of "limit"
        document.getElementById('limit').addEventListener('change', function() {
            document.getElementById('filter-form').submit();
        });

        // Print PDF Functionality
        document.getElementById('print-pdf').addEventListener('click', function () {
            window.print('pagination::tailwind');
        });
    </script>

</body>

</html>
