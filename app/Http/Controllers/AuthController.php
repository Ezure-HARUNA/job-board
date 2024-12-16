<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function create()
  {
    return view('auth.create');
  }

  public function store(LoginRequest $request)
  {
<<<<<<< HEAD
    $validatedData = $request->validated();
=======
    $request->validated([
      'email' => 'required|email',
      'password' => 'required'
    ]);
>>>>>>> 765dc99c73c446b3b1b8a36b8b838cbe96d79c01
    $credentials = $request->only('email', 'password');
    $remember = $request->filled('remember');

    if (Auth::attempt($credentials, $remember)) {
      return redirect()->intended('/');
    } else {
      return redirect()->back()
        ->with('error', 'ログイン情報が間違っています');
    }
  }
  public function destroy()
  {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
  }
}
