<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $method = $request->input('method');
    
        if ($method == 'GET') {
            return view('auth.login', [
                'title' => 'Login',
            ]);
        }
    
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('kelas.index')->with('success', "Login Success.");
        }
    
        return back()->with('error', 'Login Failed.');
    }
    

    public function register(Request $request) {
        $method = $request->input('method');

        if($method == 'GET') {
            return view('auth.register',[
                'title' => 'Register',
            ]);
        }

        $validate = $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        $result = User::create($validate);

        if ($result) {
            return redirect()->route('students.index')->with('success', "Register Success.");
        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('students.index')->with('success', "Logout Success");
    }
}
