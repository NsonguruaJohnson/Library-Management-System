<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        # Start

        $search = $request->search;
        if ($search === NULL){
            $books = Book::latest()->get();
        } else {
            $books = Book::where('author', 'like','%'. $search . '%')
                            ->orwhere('title', 'like', '%'. $search . '%')
                            ->latest()->get();
        }       

        #End
        // $books = Book::latest()->get();
        return view('dashboard', [
            'books' => $books
        ]);
    }

   
}
