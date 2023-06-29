<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
  public function home()
  {
    return view('pages.home');
  }

  public function index()
  {
    return view('components.forms.login');
  }

  public function login(Request $request)
  {
    $request->validate(
      [
        'email' => 'required',
        'password' => 'required'
      ]
    );

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      return redirect()->intended('dashboard')->with('message', 'You\'ve successfully signed in!');
    }
    return redirect('/login')->with('message', 'Login details are not valid!');
  }
  public function register()
  {
    return view('components.forms.register');
  }

  public function registerSave(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6'
    ]);

    $data = $request->all();
    $this->create($data);

    return redirect('dashboard');
  }

  public function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
  }

  public function dashboard()
  {
    if (Auth::check()) {
      return view('components.dashboard');
    }
    return redirect('/login');
  }
  public function signOut()
  {
    Session::flush();
    Auth::logout();

    return redirect('login');
  }
}
