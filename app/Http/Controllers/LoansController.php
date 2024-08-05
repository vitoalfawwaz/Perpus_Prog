<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loans;
use App\Models\Member;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loans::with(['book', 'member'])->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $books = Book::all();
        $members = Member::all();
        return view('loans.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        Loans::create($request->all());
        return redirect()->route('loans.index')->with('success', 'Loan created successfully.');
    }

    public function show(Loans $loan)
    {
        return view('loans.show', compact('loan'));
    }

    public function edit(Loans $loan)
    {
        $books = Book::all();
        $members = Member::all();
        return view('loans.edit', compact('loan', 'books', 'members'));
    }

    public function update(Request $request, Loans $loan)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        $loan->update($request->all());
        return redirect()->route('loans.index')->with('success', 'Loan updated successfully.');
    }

    public function destroy(Loans $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully.');
    }
}
