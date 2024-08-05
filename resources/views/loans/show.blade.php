<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peminjaman</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Detail Peminjaman</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <h2 class="text-lg font-bold mb-2">Buku: {{ $loan->book->judul }}</h2>
                <p class="text-gray-700 mb-2"><strong>Penulis:</strong> {{ $loan->book->penulis }}</p>
                <p class="text-gray-700 mb-2"><strong>Penerbit:</strong> {{ $loan->book->penerbit }}</p>
                <p class="text-gray-700 mb-2"><strong>Tanggal Terbit:</strong> {{ $loan->book->tanggal_terbit }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold mb-2">Anggota: {{ $loan->member->nama }}</h2>
                <p class="text-gray-700 mb-2"><strong>Email:</strong> {{ $loan->member->email }}</p>
                <p class="text-gray-700 mb-2"><strong>Telepon:</strong> {{ $loan->member->telepon }}</p>
                <p class="text-gray-700 mb-2"><strong>Alamat:</strong> {{ $loan->member->alamat }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-bold mb-2">Detail Peminjaman</h2>
                <p class="text-gray-700 mb-2"><strong>Tanggal Pinjam:</strong> {{ $loan->tanggal_pinjam }}</p>
                <p class="text-gray-700 mb-2"><strong>Tanggal Kembali:</strong> {{ $loan->tanggal_kembali }}</p>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('loans.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Kembali</a>
                <form action="{{ route('loans.destroy', $loan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
