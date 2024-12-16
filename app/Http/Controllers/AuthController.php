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
    $request->validated([
      'email' => 'required|email',
      'password' => 'required'
    ]);
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
