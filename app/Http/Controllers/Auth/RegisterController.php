<?php

namespace App\Http\Controllers\Auth;

use App\Dtos\Auth\RegisterDto;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function registerForm(): View
    {
        return view('auth/register');
    }

    public function register(RegisterDto $dto): RedirectResponse
    {
        $user = User::query()->create([
            'phone' => $dto->phone,
            'name' => $dto->name,
            'password' => Hash::make($dto->password),
        ]);

        Auth::login($user, true);

        return redirect()->route('home');
    }
}
