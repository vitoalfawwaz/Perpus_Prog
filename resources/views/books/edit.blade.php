<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Edit Buku</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 font-bold mb-2">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ $book->judul }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="penulis" class="block text-gray-700 font-bold mb-2">Penulis</label>
                    <input type="text" name="penulis" id="penulis" value="{{ $book->penulis }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $book->deskripsi }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="penerbit" class="block text-gray-700 font-bold mb-2">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" value="{{ $book->penerbit }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="tanggal_terbit" class="block text-gray-700 font-bold mb-2">Tanggal Terbit</label>
                    <input type="date" name="tanggal_terbit" id="tanggal_terbit" value="{{ $book->tanggal_terbit }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="jumlah" class="block text-gray-700 font-bold mb-2">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ $book->jumlah }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Gambar</label>
                    @if($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}" class="mb-4 w-32 h-32 object-cover">
                    @endif
                    <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Buku
                    </button>
                    <a href="{{ route('books.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
