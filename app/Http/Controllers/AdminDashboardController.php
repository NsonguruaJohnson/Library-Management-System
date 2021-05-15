<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'author' => ['required'],
            // 'book_file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
            'book_file' => 'required|mimes:pdf|max:2048', #2mb
            'book_cover' => ['required', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'], #2mb
        ], [
            'book_file.max' => 'The book must not be greater than 2mb',
            'book_cover.max' => 'The book cover must not be greater than 2mb'

        ]);
        // dd($request->book_file);

            // $file = $request->file('book_file');
            $bookName = time().'_'.$request->file('book_file')->getClientOriginalName();
            $bookPath = $request->file('book_file')->storeAs('uploads', $bookName, 'public');

            # For BookCover
            $bookCoverName = time().'_'.$request->file('book_cover')->getClientOriginalName();
            $bookCoverPath = $request->file('book_cover')->storeAs('bookcover', $bookCoverName , 'public');


        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->user_id = auth()->user()->id;
        $book->book_name = $bookName;
        $book->book_path = '/storage/' . $bookPath;

        $book->book_cover = $bookCoverName;
        $book->book_cover_path = '/storage/' . $bookCoverPath;
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

    public function editbook($id){
        $book = Book::find($id);
        return view('admin.editbook', [
            'book' => $book
        ]);
    }

    public function updatebook(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'author' => ['required']
        ]);

        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->user_id = auth()->user()->id;
        $book->update();

        return back()->with('msg', 'Book Updated');
    }

    public function deletebook($id){
        $book = Book::find($id);

        # Start 15th May

        // Delete the book thumbnail and bookfile from local storage

        Storage::delete(['/public/bookcover/'.$book->book_cover, '/public/uploads/'.$book->book_name]);

        # End

        // Delete the book path from db
        $book->delete();

        return redirect()->route('admin.dashboard');
    }
}
