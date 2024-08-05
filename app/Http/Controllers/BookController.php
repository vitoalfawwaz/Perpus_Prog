<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'nullable',
            'penerbit' => 'nullable',
            'tanggal_terbit' => 'nullable|date',
            'jumlah' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        } else {
            $imagePath = null;
        }

        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'penerbit' => $request->penerbit,
            'tanggal_terbit' => $request->tanggal_terbit,
            'jumlah' => $request->jumlah,
            'image' => $imagePath,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'nullable',
            'penerbit' => 'nullable',
            'tanggal_terbit' => 'nullable|date',
            'jumlah' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::delete('public/' . $book->image);
            }
            $imagePath = $request->file('image')->store('books', 'public');
        } else {
            $imagePath = $book->image;
        }

        $book->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'penerbit' => $request->penerbit,
            'tanggal_terbit' => $request->tanggal_terbit,
            'jumlah' => $request->jumlah,
            'image' => $imagePath,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->image) {
            Storage::delete('public/' . $book->image);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
