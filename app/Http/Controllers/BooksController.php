<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        $data = '';
        
        return view('books.books', [
            'books' => $books,
            'data' => $data,
        ]);
    }
    
    public function create()
    {
        $book = new Book;
        
        return view('books.create', [
            'book' => $book,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'writer' => 'required|max:255',
        ],
        [
            'title.required' => 'タイトルは必須項目です。',
            'writer.required' => '著者は必須項目です。',
        ]);
        
        $book = new Book;

        $book->title = $request->title;
        $book->writer = $request->writer;
        $book->image_url = $request->image_url;
        $book->save();
        
        return redirect('books');
    }
    
    public function show($id)
    {
        $book = Book::findOrFail($id);
        
        return view('books.show', [
            'book' => $book,
        ]);
    }
    
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        
        return view('books.edit', [
            'book' => $book,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'writer' => 'required|max:255',
        ],
        [
            'title.required' => 'タイトルは必須項目です。',
            'writer.required' => '著者は必須項目です。',
        ]);

        $book = Book::findOrFail($id);

        $book->title = $request->title;
        $book->writer = $request->writer;
        $book->image_url = $request->image_url;
        $book->save();
        
        return redirect('books');
    }
    
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        
        return redirect('books');
    }
}
