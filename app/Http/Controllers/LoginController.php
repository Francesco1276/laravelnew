<?php
 
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
 
class LoginController extends Controller
{
    public function Login()
    {
        return view('login.login');
    }

    public function Register()
    {
        return view('register');
    }

    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function inputRegister(Request $request)
    {
        // dd($register->all());
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
            'name' => 'required|min:4|max:50',
            'username' => 'required|min:4|max:8',
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/')->with('succes', 'Berhasil membuat akun');

    }

    public function Auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => "User Name Ini Tidak Terdaftar"
        ]);
        $user = $request->only ('username','password');
        if (Auth::attempt($user)){
            return redirect()->route('todo.index');
        }else{
            return redirect('/')->with('fail', "Gagal login, periksa dan coba lagi ");
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}



