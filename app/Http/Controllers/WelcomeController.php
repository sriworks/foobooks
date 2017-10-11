<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    // Welcome.
    public function __invoke()
    {
        return view('welcome');
    }
}
