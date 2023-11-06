<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (Hash::check($data['password'], $user['password'])) {
            Auth::login($user);
            return redirect()->route('admin.index');
        }

        return redirect()->route('user.login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('user.login');
    }

    public function edit(): View
    {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = Auth::user();

        if (Hash::check($data['old_password'], $user['password'])) {
            $user->update([
                'email' => $data['email'],
                'password' => Hash::make($data['new_password'])
            ]);

            return redirect()->route('user.logout');
        }

        return redirect()->back();
    }
}
