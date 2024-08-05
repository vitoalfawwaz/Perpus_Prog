<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Tambah Buku Baru</h1>
        <form action="{{ route('books.store') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="judul" class="block text-gray-700">Judul:</label>
                <input type="text" name="judul" id="judul" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label for="penulis" class="block text-gray-700">Penulis:</label>
                <input type="text" name="penulis" id="penulis" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label for="deskripsi" class="block text-gray-700">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full px-4 py-2 border rounded"></textarea>
            </div>
            <div>
                <label for="penerbit" class="block text-gray-700">Penerbit:</label>
                <input type="text" name="penerbit" id="penerbit" class="w-full px-4 py-2 border rounded">
            </div>
            <div>
                <label for="tanggal_terbit" class="block text-gray-700">Tanggal Terbit:</label>
                <input type="date" name="tanggal_terbit" id="tanggal_terbit" class="w-full px-4 py-2 border rounded">
            </div>
            <div>
                <label for="jumlah" class="block text-gray-700">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label for="image" class="block text-gray-700">Gambar Buku:</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>
</body>
</html>
