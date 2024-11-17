<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Users</h1>
            <a href="{{ route('user.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Tambah User Baru</a>
        </div>

        <!-- Search bar -->
        <form action="{{ route('user.index') }}" method="GET" class="mb-4">
            <div class="flex">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari user..." 
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

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- User Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">ID User</th>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">No. Handphone</th>
                        <th class="px-6 py-3 text-left">Role</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $user->id_user }}</td>
                        <td class="px-6 py-4">{{ $user->nama }}</td>
                        <td class="px-6 py-4">{{ $user->no_handphone }}</td>
                        <td class="px-6 py-4">{{ ucfirst($user->role) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('user.edit', $user->id_user) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Edit</a>
                            <form action="{{ route('user.destroy', $user->id_user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center">Tidak ada user ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            {{ $users->appends(['search' => request('search')])->links() }}
        </div>
    </main>
</div>

</body>
</html>
