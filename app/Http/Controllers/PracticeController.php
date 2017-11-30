<?php

namespace App\Http\Controllers;

use Debugbar;
use cebe\markdown\MarkdownExtra;
use App\Book;

class PracticeController extends Controller
{
    public function practice9()
    {
        $books = Book::all();
        echo $books;
    }

    public function practice8()
    {
        $books = Book::orderBy('id', 'desc')->get();
        $book = $books->first();
        dump($books);
        dump($book);
    }

    public function practice7()
    {
        $books = Book::where('author', 'LIKE', '%Rowling%')->get();

        foreach ($books as $book) {
            dump($book->author);
        }

        $results = Book::orderBy('created_at', 'desc')->limit(2)->get();

        $results = Book::where('published', '>', 1950)->get();

        $results = Book::orderBy('title', 'asc')->get();

        $results = Book::orderBy('published', 'desc')->get();

        $results = Book::where('author', '=', 'Bell Hooks')->get(); //update(['author' => 'bell hooks']);
        dump($results);

        $results = Book::where('author', '=', 'Bell Hooks')->update(['author' => 'bell hooks']);

        $results = Book::where('author', '=', 'Bell Hooks')->get();
        dump($results);

        $results = Book::where('author', '=', 'bell hooks')->get();
        dump($results);
    }

    public function practice6()
    {
        // Instantiate a new Book Model object
        $book = new Book();

        // Set the parameters
        // Note how each parameter corresponds to a field in the table
        $book->title = 'Sample by Sri -2';
        $book->author = 'J.K. Rowling';
        $book->published = 1997;
        $book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

        // Invoke the Eloquent `save` method to generate a new row in the
        // `books` table, with the above data
        $book->save();

        dump('Added: '.$book->title);
    }

    public function practice5()
    {
        // use markdown extra
        $parser = new MarkdownExtra();
        echo $parser->parse('# Hello World');
    }

    public function practice4()
    {
        Debugbar::info($_GET);
        Debugbar::info(['a' => 1, 'b' => 2, 'c' => 3]);
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');

        return 'Practice 4';
    }

    public function practice3()
    {
        return view('abc');
    }

    public function practice2()
    {
        $email = config('mail');
        dump($email);
    }

    public function practice1()
    {
        dump('This is the first example.');
    }

    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}.
     *
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     *
     * http://foobooks.loc/practice/1 => Invokes practice1
     * http://foobooks.loc/practice/5 => Invokes practice5
     * http://foobooks.loc/practice/999 => Practice route [practice999] not defined
     */
    public function index($n = null)
    {
        // If no specific practice is specified, show index of all available methods
        if (is_null($n)) {
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    // Echo'ing display code from a controller is typically bad; making an
                    // exception here because:
                    // 1. This controller is for debugging/demonstration purposes only
                    // 2. This controller is introduced before we cover views
                    echo "<a href='".str_replace('practice', './practice/', $method)."'>".$method.'</a><br>';
                }
            }
            // Otherwise, load the requested method
        } else {
            $method = 'practice'.$n;

            if (method_exists($this, $method)) {
                return $this->$method();
            } else {
                dd("Practice route [{$n}] not defined");
            }
        }
    }
}
