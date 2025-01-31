<?php

namespace App\Http\Controllers;

use App\Models\Tlanguage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function viewlogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function viewregister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'username' => 'required|string|unique:users|max:10',
        ]);

        // jika username ada space
        if (strpos($request->username, ' ') !== false) {
            return redirect()->back()->with('pesan', 'Username tidak boleh ada spasi');
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
        ]);

        $user->save();

        // add data ke table tlanguage
        Tlanguage::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }

        return redirect('/login')->with('pesan', 'Email atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
