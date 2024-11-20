<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Edit User</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="px-6 py-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" value="{{ $user->nama }}" class="mt-1 p-2 w-full border rounded-md" required>

                    <label for="no_handphone" class="block text-sm font-medium text-gray-700 mt-4">No. Handphone</label>
                    <input type="text" name="no_handphone" value="{{ $user->no_handphone }}" class="mt-1 p-2 w-full border rounded-md" required>

                    <label for="role" class="block text-sm font-medium text-gray-700 mt-4">Role</label>
                    <input type="text" name="role" value="{{ $user->role }}" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="px-6 py-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update User</button>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
