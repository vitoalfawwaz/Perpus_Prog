<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Loans</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Peminjaman</h1>
        <div class="flex justify-between mb-6">
            <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-600">Kembali ke Daftar Buku</a>
            <a href="{{ route('loans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Tambah Peminjaman</a>
        </div>
        <div class="mt-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Buku</th>
                        <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Anggota</th>
                        <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Tanggal Pinjam</th>
                        <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Tanggal Kembali</th>
                        <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $loan)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $loan->book->judul }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $loan->member->nama }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $loan->tanggal_pinjam }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $loan->tanggal_kembali }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            <a href="{{ route('loans.show', $loan->id) }}" class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600">Detail</a>
                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
