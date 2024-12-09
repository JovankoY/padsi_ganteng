<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="flex min-h-screen">
    <x-sidebar></x-sidebar>

    <main class="flex-1 p-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Create New User</h1>
        
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <!-- <div class="mb-4">
                <label for="id_user" class="block text-gray-600">ID User</label>
                <input type="text" id="id_user" name="id_user" class="w-full px-4 py-2 border rounded" required>
            </div> -->
            <div class="mb-4">
                <label for="nama" class="block text-gray-600">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="no_handphone" class="block text-gray-600">No. Handphone</label>
                <input type="text" id="no_handphone" name="no_handphone" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-600">Role</label>
                <input type="text" id="role" name="role" class="w-full px-4 py-2 border rounded" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg">Create</button>
        </form>
    </main>
</div>

</body>
</html>
