<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    /**
     * Sign in
     */
    public function signin()
    {
        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            request()->session()->regenerate();

            return redirect()
                    ->route('cpanel.index')
                    ->withSuccess("You've been logged in successfully.");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Sign out
     */
    public function signout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()
                ->route('login')
                ->withSuccess("you Have been signed out normally perfectly thanks to laravel, php, livewire, ...");
    }

    public function render()
    {
        return view('livewire.login')
                ->extends('layouts.default', [
                    'pagetitle' => 'Login',
                    'title' => 'Welcome to login page ...'
                ])
                ->section('main');
    }
}
