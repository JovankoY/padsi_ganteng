<!DOCTYPE html>
<html lang="en">
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
            <h1 class="text-2xl font-semibold text-gray-800">Loyality</h1>
        </div>

        <!-- Pelanggan Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">ID Pelanggan</th>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">No Handphone</th>
                        <th class="px-6 py-3 text-left">Kode Referal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggan as $item)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $item->id_pelanggan }}</td>
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
