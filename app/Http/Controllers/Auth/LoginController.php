<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        // dd($request->remember);
        $this->validate($request,[
            'username' => ['required', 'max:200'],
            'password' => ['required']
        ]);

        Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ], $request->remember);

        if(auth()->user() !== null && auth()->user()->role !== 'admin'){
            return redirect()->route('dashboard');
        }

        if (auth()->user() !== null && auth()->user()->role === 'admin'){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('msg', 'Invavlid login details');
    }
}
