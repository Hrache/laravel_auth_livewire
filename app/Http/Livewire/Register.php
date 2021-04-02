<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class Register extends Component
{
    public function signup()
    {
        $valid = Validator::make(request()->all(), [
            'name' => 'required|string|between:2,255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|between:8,34',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($valid->fails()) {
            return back()->withInput()->withErrors($valid->errors());
        }

        $user = new User();
        $user->fill(request()->input());
        $user->password = bcrypt(request()->password);

        if (!$user->save()) {
            return back()->withInput()->withError(__('model.failure', ['model' => User::class]));
        }

        return redirect()->route('home.index')->withSuccess("Account have been created succesfully.");
    }

    public function render()
    {
        return view('livewire.register')
                ->extends('layouts.default', [
                    'pagetitle' => 'Registration',
                    'title' => 'Register a new account'
                ])
                ->section('main');
    }
}
