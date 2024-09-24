<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  public function login()
  {
    return view('login');
  }
  public function registerIndex()
  {
    return view('register');
  }

  public function register(Request $request)
  {
    $request->validate([
      'name' => ['required'],
      'email' => ['required', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    auth()->login($user);

    return redirect()->route('home')->with('success', 'Registration successful!');
  }

  public function loginPost(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    $credentials = $request->only('email', 'password');

    $result =  Auth::attempt($credentials);

    if ($result) {
      return redirect()->route('home');
    } else {
      $errors = new MessageBag(['password' => ['Email and/or Password invalid.']]);

      return redirect()->back()->withErrors($errors);
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('home');
  }
}
