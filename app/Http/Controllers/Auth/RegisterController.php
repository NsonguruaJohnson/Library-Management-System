<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users,email',
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'confirmed']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->is_verified = 0;
        $user->save();

        return redirect()->route('dashboard');
    }
}
