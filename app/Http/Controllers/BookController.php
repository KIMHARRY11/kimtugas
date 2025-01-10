<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
{
    // Ambil kata kunci pencarian dari input
    $search = $request->get('search');
    
    // Cari buku berdasarkan nama, pengarang, kategori, atau penerbit
    $books = Book::when($search, function ($query, $search) {
        return $query->where('book_name', 'like', "%{$search}%")
                     ->orWhere('author', 'like', "%{$search}%")
                     ->orWhere('category', 'like', "%{$search}%")
                     ->orWhere('publisher', 'like', "%{$search}%");
    })
    ->get();

    // Tampilkan view dengan data buku yang sesuai
    return view('index', compact('books'));
}



    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_name' => 'required|max:255',
            'author' => 'required|max:255',
            'category' => 'required|max:255',
            'publisher' => 'required|max:255',
        ]);

        Book::create($validated);

        return redirect()->route('index')->with('success', 'Buku Berhasil Ditambahkan');
    }


    public function edit($id)
    {
        $book = Book::where('id', $id)->firstOrFail();
        return view('edit', compact('book'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'book_name' => 'required|max:255',
            'author' => 'required|max:255',
            'category' => 'required|max:255',
            'publisher' => 'required|max:255',
        ]);

        // Temukan buku berdasarkan book_name
        $book = Book::where('id', $id)->firstOrFail();

        // Update data buku
        $book->update([
            'book_name' => $request->book_name,
            'author' => $request->author,
            'category' => $request->category,
            'publisher' => $request->publisher,
        ]);

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('index')->with('success', 'Buku Berhasil Diedit');
    }



    public function destroy($id)
    {
        $book = Book::where('id', $id)->firstOrFail();
        $book->delete();

        return redirect()->route('index')->with('success', 'Buku Berhasil Dihapus');
    }



    
}
