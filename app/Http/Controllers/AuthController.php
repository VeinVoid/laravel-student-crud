<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView() {

        if(Auth::check()) return redirect()->route('dashboard.home');

        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function login(Request $request) {

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.home')->with('success', "Login Success.");
        }
    
        return back()->with('error', 'Login Failed.');
    }

    public function registerView() {
        $schools = School::all();
        $kelas = Kelas::all();

        if(Auth::check()) return redirect()->route('dashboard.home');

        return view('auth.register',[
            'title'     => 'Register',
            'schools'   => $schools,
            'kelas'     => $kelas
        ]);
    }

    public function register(Request $request) {

        $validate = $request->validate([
            'school_id'     => 'required',
            'kelas_id'      => 'required',
            'name'          => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        $result = User::create($validate);

        if ($result) {
            return redirect()->route('login')->with('success', "Register Success.");
        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('dashboard.home')->with('success', "Logout Success");
    }
}
