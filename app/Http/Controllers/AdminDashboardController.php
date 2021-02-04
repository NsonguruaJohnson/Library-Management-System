<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::get();
        $books = Book::latest()->get();
        return view('admin.dashboard', [          
            // 'users' => collect(), #This is used to return an empty collection
            'users' => $users,
            'books' => $books
        ]);
    }

    public function adduser(){
        return view('admin.adduser');
    }

    public function addbook(){
        return view('admin.addbook');
    }

    public function storebook(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'author' => ['required']
        ]);
        // dd($request);
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->user_id = auth()->user()->id;
        $book->save();

        return back()->with('msg', 'Book added');
    }

    public function storeuser(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',  #This code is similar to the one below
            // 'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required|confirmed'
        ]);
        // dd($request->username);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->is_verified = 1;
        $user->save();

        return back()->with('msg', 'User created');

    }
}
