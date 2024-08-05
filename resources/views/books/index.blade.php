<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Buku</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
            @foreach($books as $book)
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">
                <div class="flex-grow">
                    @if($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                    @else
                    <img src="https://via.placeholder.com/150" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="p-4 flex flex-col">
                    <h2 class="text-lg font-bold mb-2">{{ $book->judul }}</h2>
                    <p class="text-gray-700 mb-2"><strong>Penulis:</strong> {{ $book->penulis }}</p>
                    <p class="text-gray-700 mb-4"><strong>Jumlah:</strong> {{ $book->jumlah }}</p>
                    <div class="mt-auto flex justify-between">
                        <a href="{{ route('books.show', $book->id) }}" class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600">Lihat Detail</a>
                        {{-- <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded shadow hover:bg-yellow-500">Edit</a> --}}
                        {{-- <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600">Hapus</button>
                        </form> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-between items-center">
            <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Tambah Buku</a>
            <a href="{{ route('loans.index') }}" class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600">Daftar Peminjaman</a>
        </div>
    </div>
</body>
</html>
