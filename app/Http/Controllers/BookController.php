<?php

namespace App\Http\Controllers;

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
}
