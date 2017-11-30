<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    // Book home - returns a list of books.
    public function index()
    {
        return 'List of books shows up here..';
    }

    // Get a single book
    public function get($title)
    {
        return 'You are viewing '.$title;
    }

    /**
     * GET /book/{$id}.
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return redirect('/book')->with('alert', 'Book not found');
        }

        return view('book.show')->with([
            'book' => $book,
        ]);
    }

    /**
     * GET /book/{$id}.
     */
    public function showConfirmDelete($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return redirect('/book')->with('alert', 'Book not found');
        }

        return view('book.delete')->with([
            'book' => $book,
        ]);
    }

    public function delete($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return redirect('/book')->with('alert', 'Book not found');
        }
        $book->delete();

        return redirect('/book')->with('alert', 'Book deleted successfully');
    }
}
