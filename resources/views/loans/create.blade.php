<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Tambah Peminjaman</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="book_id" class="block text-gray-700 font-bold mb-2">Buku</label>
                    <select name="book_id" id="book_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Pilih Buku</option>
                        @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="member_id" class="block text-gray-700 font-bold mb-2">Anggota</label>
                    <select name="member_id" id="member_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Pilih Anggota</option>
                        @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanggal_pinjam" class="block text-gray-700 font-bold mb-2">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="tanggal_kembali" class="block text-gray-700 font-bold mb-2">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan
                    </button>
                    <a href="{{ route('loans.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
