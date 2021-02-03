<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::get();
        $books = Book::get();
        return view('admin.dashboard', [
            'users' => $users,
            'books' => $books
        ]);
    }

    // public function create(){
    //     return view('admin.create');
    // }
}
