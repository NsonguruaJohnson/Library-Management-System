<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $books = Book::latest()->get();
        return view('dashboard', [
            'books' => $books
        ]);
    }

   
}
