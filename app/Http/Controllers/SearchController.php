<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class SearchController extends Controller
{
    public function index(Request $request){
        
        $request->validate([
            'title' => 'required|max:255',
        ]);
        
        $query = Book::query();

        $search = $request->input('title');
    
        if ($request->has('title') && $search != '') {
            $query->where('title', 'like', '%'.$search.'%')->get();
        }
        
        $books = $query->paginate(10);
        
        return view('books.books', [
            'books' => $books,
        ]);
    }
}
