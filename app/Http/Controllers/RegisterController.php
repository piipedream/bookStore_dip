<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
  public function save(Request $request) {
      if (Auth::check()) {
          return redirect()->to(route('userpage'));
      }

      $validateFields = $request->validate([
          'login' => 'required|min:5',
          'email' => 'required|email',
          'password' => 'required|min:5|max:50|confirmed',
          'password_confirmation' => 'required'
      ]);

      if(User::where('login', $validateFields['login'])->exists()) {
          return redirect()->to(route('user.signup'))->withErrors([
              'emailError' => 'User exists'
          ]);
      }

      $user = User::create($validateFields);

      if($user){
          auth()->login($user);
          return redirect()->to(route('userpage'));
      }

      return redirect()->to(route('user.signup'))->withErrors([
          'formError' => 'Failed to register'
      ]);

    }
}
