<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Detail Buku</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden flex">
            <div class="w-1/3">
                @if($book->image)
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                @else
                <img src="https://via.placeholder.com/150" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                @endif
            </div>
            <div class="w-2/3 p-4">
                <h2 class="text-lg font-bold mb-2">{{ $book->judul }}</h2>
                <p class="text-gray-700 mb-2"><strong>Penulis:</strong> {{ $book->penulis }}</p>
                <p class="text-gray-700 mb-2"><strong>Deskripsi:</strong> {{ $book->deskripsi }}</p>
                <p class="text-gray-700 mb-2"><strong>Penerbit:</strong> {{ $book->penerbit }}</p>
                <p class="text-gray-700 mb-2"><strong>Tanggal Terbit:</strong> {{ $book->tanggal_terbit }}</p>
                <p class="text-gray-700 mb-4"><strong>Jumlah:</strong> {{ $book->jumlah }}</p>
                <div class="flex justify-between">
                    <a href="{{ route('books.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Kembali</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded shadow hover:bg-yellow-500">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
