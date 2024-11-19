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
                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="w-full p-2 border rounded" required>
            </div>

            <!-- Order Name -->
            <div class="mb-4">
                <label for="nama_pesanan" class="block text-gray-700">Order Name</label>
                <input type="text" name="nama_pesanan" id="nama_pesanan" class="w-full p-2 border rounded" required>
            </div>

             <!-- Total Price -->
             <div class="mb-4">
                <label for="total_harga" class="block text-gray-700">Total Price</label>
                <input type="number" name="total_harga" id="total_harga" class="w-full p-2 border rounded" required>
            </div>

            <!-- User Dropdown -->
            <div class="mb-4">
                <label for="id_user" class="block text-gray-700">User</label>
                <select name="id_user" id="id_user" class="w-full p-2 border rounded" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }} ({{ $user->role }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Customer Dropdown -->
            <div class="mb-4">
                <label for="id_pelanggan" class="block text-gray-700">Customer</label>
                <select name="id_pelanggan" id="id_pelanggan" class="w-full p-2 border rounded" required>
                    @foreach($pelanggan as $pelanggan)
                        <option value="{{ $pelanggan->id_pelanggan }}">{{ $pelanggan->nama }} ({{ $pelanggan->no_handphone }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </main>
</div>

</body>
</html>
