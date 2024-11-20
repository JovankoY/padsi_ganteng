<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Content Area -->
    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Create Transaction</h1>
        </div>

        <form action="{{ route('transaksi.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <!-- ID Transaksi -->
            <div class="mb-4">
                <label for="id_transaksi" class="block text-gray-700">Transaction ID</label>
                <input type="text" name="id_transaksi" id="id_transaksi" class="w-full p-2 border rounded" required>
            </div>

            <!-- Transaction Date -->
            <div class="mb-4">
                <label for="tanggal_transaksi" class="block text-gray-700">Transaction Date</label>
                <input type="datetime-local" name="tanggal_transaksi" id="tanggal_transaksi" class="w-full p-2 border rounded" required>
            </div>

            <!-- Menu Selection -->
            <div class="mb-4">
                <label for="id_menu" class="block text-gray-700">Menu</label>
                <select name="id_menu" id="id_menu" class="w-full p-2 border rounded" required>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id_menu }}" data-price="{{ $menu->harga }}">{{ $menu->nama_menu }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Order Quantity -->
            <div class="mb-4">
                <label for="jumlah_pesanan" class="block text-gray-700">Order Quantity</label>
                <input type="number" name="jumlah_pesanan" id="jumlah_pesanan" class="w-full p-2 border rounded" required>
            </div>

            <!-- Total Price -->
            <div class="mb-4">
                <label for="total_harga" class="block text-gray-700">Total Price</label>
                <input type="number" name="total_harga" id="total_harga" class="w-full p-2 border rounded" readonly>
            </div>

            <input type="hidden" name="harga_menu" id="harga_menu">

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        </form>
    </main>
</div>

<script>
    const menuSelect = document.getElementById('id_menu');
    const jumlahPesananInput = document.getElementById('jumlah_pesanan');
    const totalHargaInput = document.getElementById('total_harga');
    const hargaMenuInput = document.getElementById('harga_menu');

    // Fungsi untuk menghitung total harga
    function calculateTotalPrice() {
        const selectedOption = menuSelect.options[menuSelect.selectedIndex];
        const hargaMenu = parseFloat(selectedOption.getAttribute('data-price')) || 0;
        const jumlahPesanan = parseInt(jumlahPesananInput.value) || 0;
        totalHargaInput.value = hargaMenu * jumlahPesanan;
        hargaMenuInput.value = hargaMenu;
    }

    // Event listener untuk ketika memilih menu
    menuSelect.addEventListener('change', calculateTotalPrice);

    // Event listener untuk ketika jumlah pesanan berubah
    jumlahPesananInput.addEventListener('input', calculateTotalPrice);

    // Inisialisasi total harga saat pertama kali load
    calculateTotalPrice();
</script>

</body>
</html>
