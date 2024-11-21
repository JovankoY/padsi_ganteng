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

            <!-- Tanggal Transaksi -->
            <div class="mb-4">
                <label for="tanggal_transaksi" class="block text-gray-700">Tanggal Transaksi</label>
                <input type="datetime-local" name="tanggal_transaksi" id="tanggal_transaksi" class="w-full p-2 border rounded" required>
            </div>

            <!-- Menu Input Groups -->
            <div id="menus">
                <div class="menu-group mb-4">
                    <label for="menus[0][id_menu]" class="block text-gray-700">Menu</label>
                    <select name="menus[0][id_menu]" class="menu-select w-full p-2 border rounded" required>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id_menu }}" data-price="{{ $menu->harga }}">
                                {{ $menu->nama_menu }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>

                    <label for="menus[0][jumlah_pesanan]" class="block text-gray-700 mt-2">Jumlah Pesanan</label>
                    <input type="number" name="menus[0][jumlah_pesanan]" class="jumlah-pesanan w-full p-2 border rounded" min="1" required>
                </div>
            </div>

            <!-- Tombol Tambah Menu -->
            <button type="button" id="add-menu" class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600 mb-4">Tambah Menu</button>

            <!-- Total Harga -->
            <div class="mb-4">
                <label for="total_harga" class="block text-gray-700">Total Harga</label>
                <input type="text" id="total_harga" name="total_harga" class="w-full p-2 border rounded bg-gray-100" readonly>
            </div>

            <!-- Uang Pembeli -->
            <div class="mb-4">
                <label for="uang_pembeli" class="block text-gray-700">Uang Pembeli</label>
                <input type="number" id="uang_pembeli" name="uang_pembeli" class="w-full p-2 border rounded" required>
            </div>

            <!-- Kembalian -->
            <div class="mb-4">
                <label for="kembalian" class="block text-gray-700">Kembalian</label>
                <input type="text" id="kembalian" class="w-full p-2 border rounded bg-gray-100" readonly>
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </main>
</div>

<script>
    const menusContainer = document.getElementById('menus');
    const totalHargaInput = document.getElementById('total_harga');
    const uangPembeliInput = document.getElementById('uang_pembeli');
    const kembalianInput = document.getElementById('kembalian');
    const addMenuButton = document.getElementById('add-menu');
    let menuIndex = 1;

    function calculateTotalHarga() {
        let totalHarga = 0;
        const menuGroups = menusContainer.querySelectorAll('.menu-group');
        menuGroups.forEach(group => {
            const menuSelect = group.querySelector('.menu-select');
            const jumlahPesananInput = group.querySelector('.jumlah-pesanan');
            const selectedOption = menuSelect.options[menuSelect.selectedIndex];
            const hargaMenu = parseFloat(selectedOption.getAttribute('data-price')) || 0;
            const jumlahPesanan = parseInt(jumlahPesananInput.value) || 0;
            totalHarga += hargaMenu * jumlahPesanan;
        });
        totalHargaInput.value = totalHarga;
        calculateKembalian();
    }

    function calculateKembalian() {
        const totalHarga = parseFloat(totalHargaInput.value) || 0;
        const uangPembeli = parseFloat(uangPembeliInput.value) || 0;
        const kembalian = uangPembeli - totalHarga;
        kembalianInput.value = kembalian >= 0 ? kembalian : 'Uang tidak cukup';
    }

    function addMenuInput() {
        const newMenuGroup = document.createElement('div');
        newMenuGroup.className = 'menu-group mb-4';
        newMenuGroup.innerHTML = `
            <label for="menus[${menuIndex}][id_menu]" class="block text-gray-700">Menu</label>
            <select name="menus[${menuIndex}][id_menu]" class="menu-select w-full p-2 border rounded" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id_menu }}" data-price="{{ $menu->harga }}">
                        {{ $menu->nama_menu }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            <label for="menus[${menuIndex}][jumlah_pesanan]" class="block text-gray-700 mt-2">Jumlah Pesanan</label>
            <input type="number" name="menus[${menuIndex}][jumlah_pesanan]" class="jumlah-pesanan w-full p-2 border rounded" min="1" required>
        `;
        menusContainer.appendChild(newMenuGroup);
        menuIndex++;
        calculateTotalHarga();
    }

    menusContainer.addEventListener('input', calculateTotalHarga);
    uangPembeliInput.addEventListener('input', calculateKembalian);
    addMenuButton.addEventListener('click', addMenuInput);
    calculateTotalHarga();
</script>

</body>

</html>
