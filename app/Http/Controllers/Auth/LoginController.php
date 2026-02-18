<?php

namespace App\Http\Controllers\Auth;

use App\Dtos\Auth\LoginDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function loginForm(): View
    {
        return view('auth.login');
    }

    public function login(
        LoginDto $dto,
        Request $request,
    ): RedirectResponse
    {
        if (
            !Auth::attempt([
                'phone' => $dto->phone,
                'password' => $dto->password,
            ], $request->boolean('remember'))
        ) {
            return back()->withInput()->withErrors(['auth' => 'Неверный логин или пароль.']);
        }

        return redirect()->route('home');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
